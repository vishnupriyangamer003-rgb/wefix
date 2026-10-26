<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = DB::table('testimonials')->orderBy('sort_order')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.form', ['testimonial' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = image_helper_compress_and_store($request->file('photo'), 'testimonials', 400, 400);
        }

        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('testimonials')->insert($data);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial created.');
    }

    public function edit($id)
    {
        $testimonial = db_find_or_404('testimonials', $id);

        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = db_find_or_404('testimonials', $id);
        $data = $this->validateData($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = image_helper_compress_and_store($request->file('photo'), 'testimonials', 400, 400);
            image_helper_delete($testimonial->photo);
        }

        $data['updated_at'] = now();

        DB::table('testimonials')->where('id', $id)->update($data);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial updated.');
    }

    public function destroy($id)
    {
        $testimonial = db_find_or_404('testimonials', $id);
        DB::table('testimonials')->where('id', $id)->delete();
        image_helper_delete($testimonial->photo);

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimonial deleted.');
    }

    public function toggleStatus($id)
    {
        $testimonial = db_find_or_404('testimonials', $id);
        $newStatus = $testimonial->status ? 0 : 1;

        DB::table('testimonials')->where('id', $id)->update(['status' => $newStatus, 'updated_at' => now()]);

        return response()->json(['status' => $newStatus]);
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'review' => ['required', 'string'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'sort_order' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ]);

        unset($data['photo']);
        $data['status'] = $request->boolean('status') ? 1 : 0;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
