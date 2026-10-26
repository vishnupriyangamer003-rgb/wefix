<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

/**
 * Product CRUD incl. multi-image gallery. No Eloquent — DB::table() throughout.
 */
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('products')->join('categories', 'categories.id', '=', 'products.category_id');

        if ($search = $request->query('q')) {
            $like = '%' . $search . '%';
            $query->where(function ($w) use ($like) {
                $w->where('products.name_en', 'like', $like)
                    ->orWhere('products.slug', 'like', $like);
            });
        }

        if ($categoryId = $request->query('category_id')) {
            $query->where('products.category_id', $categoryId);
        }

        $products = $query->orderBy('products.sort_order')
            ->paginate(20, ['products.*', 'categories.name_en as category_name'])
            ->withQueryString();

        $categories = category_flattened_options();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = category_flattened_options();

        return view('admin.products.form', ['product' => null, 'images' => collect(), 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['created_at'] = now();
        $data['updated_at'] = now();

        $productId = DB::table('products')->insertGetId($data);

        $this->storeImages($request, $productId);

        return redirect()->route('admin.products.edit', $productId)->with('status', 'Product created.');
    }

    public function edit($id)
    {
        $product = db_find_or_404('products', $id);
        $images = DB::table('product_images')->where('product_id', $id)->orderBy('is_primary', 'desc')->orderBy('sort_order')->get();
        $categories = category_flattened_options();

        return view('admin.products.form', compact('product', 'images', 'categories'));
    }

    public function update(Request $request, $id)
    {
        db_find_or_404('products', $id);

        $data = $this->validateData($request, $id);
        $data['updated_at'] = now();

        DB::table('products')->where('id', $id)->update($data);

        $this->storeImages($request, $id);

        return redirect()->route('admin.products.edit', $id)->with('status', 'Product updated.');
    }

    public function destroy($id)
    {
        $product = db_find_or_404('products', $id);

        try {
            DB::table('products')->where('id', $id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Cannot delete this product — it appears in existing orders.');
        }

        $images = DB::table('product_images')->where('product_id', $id)->get();
        foreach ($images as $image) {
            image_helper_delete($image->path);
        }

        return redirect()->route('admin.products.index')->with('status', 'Product deleted.');
    }

    public function toggleStatus($id)
    {
        $product = db_find_or_404('products', $id);
        $newStatus = $product->status ? 0 : 1;

        DB::table('products')->where('id', $id)->update(['status' => $newStatus, 'updated_at' => now()]);

        return response()->json(['status' => $newStatus]);
    }

    public function deleteImage($productId, $imageId)
    {
        $image = db_find_or_404('product_images', $imageId);

        if ((int) $image->product_id !== (int) $productId) {
            abort(404);
        }

        DB::table('product_images')->where('id', $imageId)->delete();
        image_helper_delete($image->path);

        // If we just deleted the primary image, promote the next one.
        $stillHasPrimary = DB::table('product_images')->where('product_id', $productId)->where('is_primary', 1)->exists();
        if (!$stillHasPrimary) {
            $next = DB::table('product_images')->where('product_id', $productId)->orderBy('sort_order')->first();
            if ($next) {
                DB::table('product_images')->where('id', $next->id)->update(['is_primary' => 1]);
            }
        }

        return back()->with('status', 'Image removed.');
    }

    public function setPrimaryImage($productId, $imageId)
    {
        $image = db_find_or_404('product_images', $imageId);

        if ((int) $image->product_id !== (int) $productId) {
            abort(404);
        }

        DB::table('product_images')->where('product_id', $productId)->update(['is_primary' => 0]);
        DB::table('product_images')->where('id', $imageId)->update(['is_primary' => 1]);

        return back()->with('status', 'Primary image updated.');
    }

    private function storeImages(Request $request, $productId): void
    {
        if (!$request->hasFile('images')) {
            return;
        }

        $hasPrimary = DB::table('product_images')->where('product_id', $productId)->where('is_primary', 1)->exists();
        $nextSort = (int) DB::table('product_images')->where('product_id', $productId)->max('sort_order');

        foreach ($request->file('images') as $file) {
            $nextSort++;
            $path = image_helper_compress_and_store($file, 'products', 1200, 1200);

            DB::table('product_images')->insert([
                'product_id' => $productId,
                'path' => $path,
                'alt_text' => null,
                'is_primary' => !$hasPrimary,
                'sort_order' => $nextSort,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $hasPrimary = true;
        }
    }

    private function validateData(Request $request, $ignoreId = null): array
    {
        $data = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name_en' => ['required', 'string', 'max:255'],
            'name_ta' => ['nullable', 'string', 'max:255'],
            'name_hi' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($ignoreId)],
            'short_description_en' => ['nullable', 'string'],
            'short_description_ta' => ['nullable', 'string'],
            'short_description_hi' => ['nullable', 'string'],
            'full_description_en' => ['nullable', 'string'],
            'full_description_ta' => ['nullable', 'string'],
            'full_description_hi' => ['nullable', 'string'],
            'features_en' => ['nullable', 'string'],
            'features_ta' => ['nullable', 'string'],
            'features_hi' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'offer_price' => ['nullable', 'numeric', 'min:0', 'lt:price'],
            'stock' => ['required', 'integer', 'min:0'],
            'moq' => ['required', 'integer', 'min:1'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'search_keywords' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:5120'],
        ]);

        unset($data['images']);
        $data['status'] = $request->boolean('status') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
