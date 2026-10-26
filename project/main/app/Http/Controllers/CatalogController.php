<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Public storefront catalog: home, category/product listing, product detail,
 * and AJAX search. No Eloquent — everything is DB::table() per CLAUDE.md.
 */
class CatalogController extends Controller
{
    public function index()
    {
        $banners = DB::table('banners')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $featuredProducts = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.status', 1)
            ->orderBy('products.sort_order')
            ->limit(8)
            ->get([
                'products.id', 'products.name_en', 'products.name_ta', 'products.name_hi', 'products.slug', 'products.price',
                'products.offer_price', 'products.moq', 'categories.name_en as category_name_en', 'categories.name_ta as category_name_ta',
                'categories.name_hi as category_name_hi', 'categories.slug as category_slug',
            ]);

        $featuredProducts = $this->attachPrimaryImages($featuredProducts);

        $testimonials = DB::table('testimonials')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        $topCategories = DB::table('categories')
            ->whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        return view('index', compact('banners', 'featuredProducts', 'testimonials', 'topCategories'));
    }

    /**
     * Single route handles both category-filtered listing and product detail,
     * disambiguated by slug lookup — see CLAUDE.md / plan for why: both
     * "/products/tall" (category) and "/products/dwarf-orange-coconut-seedling"
     * (product) must live under the same /products/{slug} URL shape.
     *
     * Resolution order: category match first, then product match, else 404.
     */
    public function products(Request $request, $slug = null)
    {
        if ($slug !== null) {
            $category = DB::table('categories')->where('slug', $slug)->where('status', 1)->first();

            if ($category) {
                return $this->categoryListing($category, $request);
            }

            $product = DB::table('products')->where('slug', $slug)->where('status', 1)->first();

            if ($product) {
                return $this->productDetail($product);
            }

            abort(404);
        }

        return $this->categoryListing(null, $request);
    }

    private function categoryListing($category, Request $request)
    {
        $topCategories = DB::table('categories')
            ->whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('sort_order')
            ->get();

        // Sidebar subcategory filter — only meaningful once a top-level
        // category is selected (see products.blade.php sidebar).
        $subcategories = $category
            ? DB::table('categories')->where('parent_id', $category->id)->where('status', 1)->orderBy('sort_order')->get()
            : collect();

        $subcategorySlug = $request->query('subcategory');
        $selectedSubcategory = $subcategorySlug ? $subcategories->firstWhere('slug', $subcategorySlug) : null;

        $query = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.status', 1);

        if ($category) {
            $categoryIds = $selectedSubcategory
                ? category_and_descendant_ids($selectedSubcategory->id)
                : category_and_descendant_ids($category->id);
            $query->whereIn('products.category_id', $categoryIds);
        }

        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');
        $priceColumn = DB::raw('COALESCE(products.offer_price, products.price)');

        if ($minPrice !== null && $minPrice !== '') {
            $query->where($priceColumn, '>=', (float) $minPrice);
        }
        if ($maxPrice !== null && $maxPrice !== '') {
            $query->where($priceColumn, '<=', (float) $maxPrice);
        }

        $products = $query->orderBy('products.sort_order')
            ->get([
                'products.id', 'products.name_en', 'products.name_ta', 'products.name_hi', 'products.slug', 'products.price',
                'products.offer_price', 'products.moq', 'products.short_description_en', 'products.short_description_ta', 'products.short_description_hi',
                'categories.name_en as category_name_en', 'categories.name_ta as category_name_ta',
                'categories.name_hi as category_name_hi', 'categories.slug as category_slug',
            ]);

        $products = $this->attachPrimaryImages($products);

        $activeSlug = $category ? $category->slug : null;
        $type = $activeSlug; // kept for view compatibility with existing filter-button markup

        $metaTitle = $category
            ? ($category->meta_title ?: (localized($category, 'name') . ' Coconut Seedlings | Jinnah Coconut Nursery Garden'))
            : 'All Coconut Seedlings | Jinnah Coconut Nursery Garden';
        $metaDescription = $category
            ? ($category->meta_description ?: localized($category, 'short_description'))
            : 'Browse our full range of Tall, Dwarf, and Hybrid coconut seedlings.';
        $metaKeywords = $category ? $category->meta_keywords : null;

        return view('products', compact(
            'products', 'topCategories', 'subcategories', 'selectedSubcategory', 'category', 'activeSlug', 'type',
            'minPrice', 'maxPrice', 'metaTitle', 'metaDescription', 'metaKeywords'
        ));
    }

    private function productDetail($product)
    {
        $images = DB::table('product_images')
            ->where('product_id', $product->id)
            ->orderBy('is_primary', 'desc')
            ->orderBy('sort_order')
            ->get();

        $category = DB::table('categories')->find($product->category_id);
        $breadcrumbCategories = $this->categoryAncestors($product->category_id);

        $featuresText = localized($product, 'features') ?: $product->features_en;
        $features = array_values(array_filter(array_map('trim', explode("\n", (string) $featuresText))));

        $relatedProducts = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.status', 1)
            ->where('products.category_id', $product->category_id)
            ->where('products.id', '!=', $product->id)
            ->limit(4)
            ->get(['products.id', 'products.name_en', 'products.name_ta', 'products.name_hi', 'products.slug', 'products.price', 'products.offer_price']);

        $relatedProducts = $this->attachPrimaryImages($relatedProducts);

        $metaTitle = $product->meta_title ?: (localized($product, 'name') . ' | Jinnah Coconut Nursery Garden');
        $metaDescription = $product->meta_description ?: localized($product, 'short_description');
        $metaKeywords = $product->meta_keywords ?: $product->search_keywords;
        $metaImage = $images->isNotEmpty() ? asset($images->first()->path) : null;

        return view('product-detail', compact('product', 'images', 'category', 'breadcrumbCategories', 'features', 'relatedProducts', 'metaTitle', 'metaDescription', 'metaKeywords', 'metaImage'));
    }

    /**
     * AJAX live search — GET /search/suggest?q=... — triggers client-side at
     * 2-3 characters. Searches product name/slug/search_keywords and category
     * name via LIKE with bound parameters (no raw concatenation).
     */
    public function searchSuggest(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        if (mb_strlen($q) < 2) {
            return response()->json(['results' => []]);
        }

        $like = '%' . $q . '%';

        $results = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->where('products.status', 1)
            ->where(function ($w) use ($like) {
                $w->where('products.name_en', 'like', $like)
                    ->orWhere('products.slug', 'like', $like)
                    ->orWhere('products.search_keywords', 'like', $like)
                    ->orWhere('categories.name_en', 'like', $like);
            })
            ->orderBy('products.sort_order')
            ->limit(10)
            ->get([
                'products.id', 'products.name_en', 'products.name_ta', 'products.name_hi', 'products.slug',
                'products.price', 'products.offer_price', 'categories.name_en as category_name_en',
                'categories.name_ta as category_name_ta', 'categories.name_hi as category_name_hi',
            ]);

        $results = $this->attachPrimaryImages($results);

        $payload = $results->map(function ($p) {
            return [
                'name' => localized($p, 'name'),
                'url' => route('products', $p->slug),
                'price' => $p->offer_price ?: $p->price,
                'category' => localized($p, 'category_name'),
                'image' => $p->image ? asset($p->image) : null,
            ];
        });

        return response()->json(['results' => $payload]);
    }

    /**
     * GET /sitemap.xml — generated live from active categories/products plus
     * the static pages, kept in sync with robots.txt (see doc-root robots.txt).
     */
    public function sitemap()
    {
        $urls = [
            ['loc' => route('home'), 'priority' => '1.0'],
            ['loc' => route('about'), 'priority' => '0.6'],
            ['loc' => route('products'), 'priority' => '0.9'],
            ['loc' => route('planting-method'), 'priority' => '0.5'],
            ['loc' => route('gallery'), 'priority' => '0.5'],
            ['loc' => route('contact'), 'priority' => '0.5'],
            ['loc' => route('terms'), 'priority' => '0.3'],
            ['loc' => route('privacy'), 'priority' => '0.3'],
            ['loc' => route('cancellation-policy'), 'priority' => '0.3'],
            ['loc' => route('delivery-policy'), 'priority' => '0.3'],
        ];

        $categories = DB::table('categories')->where('status', 1)->get(['slug', 'updated_at']);
        foreach ($categories as $category) {
            $urls[] = ['loc' => route('products', $category->slug), 'lastmod' => $category->updated_at, 'priority' => '0.8'];
        }

        $products = DB::table('products')->where('status', 1)->get(['slug', 'updated_at']);
        foreach ($products as $product) {
            $urls[] = ['loc' => route('products', $product->slug), 'lastmod' => $product->updated_at, 'priority' => '0.8'];
        }

        return response()
            ->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Walks parent_id up from a category to build a top-down breadcrumb trail.
     */
    private function categoryAncestors(int $categoryId): array
    {
        $trail = [];
        $current = DB::table('categories')->find($categoryId);

        while ($current) {
            array_unshift($trail, $current);
            $current = $current->parent_id ? DB::table('categories')->find($current->parent_id) : null;
        }

        return $trail;
    }

    /**
     * Attaches an "image" field (primary product image, doc-root-relative
     * path) to a collection of product rows via one batched query instead of
     * N+1 lookups.
     */
    private function attachPrimaryImages($products)
    {
        $ids = $products->pluck('id')->all();
        if (empty($ids)) {
            return $products;
        }

        $images = DB::table('product_images')
            ->whereIn('product_id', $ids)
            ->orderBy('is_primary', 'desc')
            ->orderBy('sort_order')
            ->get(['product_id', 'path'])
            ->groupBy('product_id');

        return $products->map(function ($p) use ($images) {
            $p->image = isset($images[$p->id]) ? $images[$p->id]->first()->path : null;
            return $p;
        });
    }
}
