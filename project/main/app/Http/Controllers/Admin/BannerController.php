<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index()
    {
        $banners = DB::table('banners')->orderBy('sort_order')->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.form', ['banner' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['image'] = image_helper_compress_and_store($request->file('image'), 'banners', 1920, 1080);
        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('banners')->insert($data);

        return redirect()->route('admin.banners.index')->with('status', 'Banner created.');
    }

    public function edit($id)
    {
        $banner = db_find_or_404('banners', $id);

        return view('admin.banners.form', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = db_find_or_404('banners', $id);
        $data = $this->validateData($request, false);

        if ($request->hasFile('image')) {
            $data['image'] = image_helper_compress_and_store($request->file('image'), 'banners', 1920, 1080);
            image_helper_delete($banner->image);
        }

        $data['updated_at'] = now();

        DB::table('banners')->where('id', $id)->update($data);

        return redirect()->route('admin.banners.index')->with('status', 'Banner updated.');
    }

    public function destroy($id)
    {
        $banner = db_find_or_404('banners', $id);

        try {
            DB::table('banners')->where('id', $id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Cannot delete this banner.');
        }

        image_helper_delete($banner->image);

        return redirect()->route('admin.banners.index')->with('status', 'Banner deleted.');
    }

    public function toggleStatus($id)
    {
        $banner = db_find_or_404('banners', $id);
        $newStatus = $banner->status ? 0 : 1;

        DB::table('banners')->where('id', $id)->update(['status' => $newStatus, 'updated_at' => now()]);

        return response()->json(['status' => $newStatus]);
    }

    private function validateData(Request $request, bool $imageRequired = true): array
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'link_url' => ['nullable', 'string', 'max:255'],
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
