<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = DB::table('galleries')->orderBy('sort_order')->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.form', ['gallery' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['image'] = image_helper_compress_and_store($request->file('image'), 'gallery', 1200, 800);
        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('galleries')->insert($data);

        return redirect()->route('admin.galleries.index')->with('status', 'Gallery item created successfully.');
    }

    public function edit($id)
    {
        $gallery = db_find_or_404('galleries', $id);

        return view('admin.galleries.form', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = db_find_or_404('galleries', $id);
        $data = $this->validateData($request, false);

        if ($request->hasFile('image')) {
            $data['image'] = image_helper_compress_and_store($request->file('image'), 'gallery', 1200, 800);
            image_helper_delete($gallery->image);
        }

        $data['updated_at'] = now();

        DB::table('galleries')->where('id', $id)->update($data);

        return redirect()->route('admin.galleries.index')->with('status', 'Gallery item updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = db_find_or_404('galleries', $id);

        try {
            DB::table('galleries')->where('id', $id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Cannot delete this gallery item.');
        }

        image_helper_delete($gallery->image);

        return redirect()->route('admin.galleries.index')->with('status', 'Gallery item deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $gallery = db_find_or_404('galleries', $id);
        $newStatus = $gallery->status ? 0 : 1;

        DB::table('galleries')->where('id', $id)->update(['status' => $newStatus, 'updated_at' => now()]);

        return response()->json(['status' => $newStatus]);
    }

    private function validateData(Request $request, bool $imageRequired = true): array
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
            'image' => [$imageRequired ? 'required' : 'nullable', 'image', 'max:5120'],
        ]);

        unset($data['image']);
        $data['status'] = $request->boolean('status') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
