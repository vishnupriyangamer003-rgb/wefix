<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

/**
 * Category/Subcategory CRUD — one self-referencing table serves both
 * "Category CRUD" and "Subcategory CRUD" from the spec (see CLAUDE.md).
 * Rendered as a single recursive tree manager. No Eloquent.
 */
class CategoryController extends Controller
{
    public function index()
    {
        $tree = category_tree(false);

        return view('admin.categories.index', compact('tree'));
    }

    public function create()
    {
        $parents = category_flattened_options();

        return view('admin.categories.form', ['category' => null, 'parents' => $parents]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            $data['image'] = image_helper_compress_and_store($request->file('image'), 'categories', 800, 800);
        }

        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('categories')->insert($data);

        return redirect()->route('admin.categories.index')->with('status', 'Category created.');
    }

    public function edit($id)
    {
        $category = db_find_or_404('categories', $id);
        // Exclude itself and its own descendants — can't become its own parent.
        $excludeIds = category_and_descendant_ids((int) $id);
        $parents = category_flattened_options($excludeIds);

        return view('admin.categories.form', compact('category', 'parents'));
    }

    public function update(Request $request, $id)
    {
        $category = db_find_or_404('categories', $id);

        $newParentId = (int) $request->input('parent_id');
        if ($newParentId && in_array($newParentId, category_and_descendant_ids((int) $id), true)) {
            return back()->withErrors(['parent_id' => 'A category cannot be moved under itself or one of its own subcategories.'])->withInput();
        }

        $data = $this->validateData($request, $id);

        if ($request->hasFile('image')) {
            $data['image'] = image_helper_compress_and_store($request->file('image'), 'categories', 800, 800);
            image_helper_delete($category->image);
        }

        $data['updated_at'] = now();

        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('admin.categories.index')->with('status', 'Category updated.');
    }

    public function destroy($id)
    {
        $category = db_find_or_404('categories', $id);

        try {
            DB::table('categories')->where('id', $id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Cannot delete this category — it (or a subcategory) still has products assigned to it.');
        }

        image_helper_delete($category->image);

        return redirect()->route('admin.categories.index')->with('status', 'Category deleted.');
    }

    public function toggleStatus($id)
    {
        $category = db_find_or_404('categories', $id);
        $newStatus = $category->status ? 0 : 1;

        DB::table('categories')->where('id', $id)->update(['status' => $newStatus, 'updated_at' => now()]);

        return response()->json(['status' => $newStatus]);
    }

    private function validateData(Request $request, $ignoreId = null): array
    {
        $data = $request->validate([
            'parent_id' => ['nullable', 'integer', 'exists:categories,id'],
            'name_en' => ['required', 'string', 'max:255'],
            'name_ta' => ['nullable', 'string', 'max:255'],
            'name_hi' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('categories', 'slug')->ignore($ignoreId)],
            'short_description_en' => ['nullable', 'string'],
            'short_description_ta' => ['nullable', 'string'],
            'short_description_hi' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'max:5120'],
        ]);

        unset($data['image']);
        $data['status'] = $request->boolean('status') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
