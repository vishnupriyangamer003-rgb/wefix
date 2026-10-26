<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        $customer = DB::table('customers')->find(Auth::guard('web')->id());

        return view('customer.profile', compact('customer'));
    }

    public function update(Request $request)
    {
        $customerId = Auth::guard('web')->id();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email'],
            'address' => ['required', 'string'],
            'taluk' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'regex:/^[0-9]{6}$/'],
            'profile_photo' => ['nullable', 'image', 'max:5120'],
        ]);

        $update = [
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'address' => $data['address'],
            'taluk' => $data['taluk'],
            'district' => $data['district'],
            'state' => $data['state'],
            'pincode' => $data['pincode'],
            'updated_at' => now(),
        ];

        if ($request->hasFile('profile_photo')) {
            $existing = DB::table('customers')->where('id', $customerId)->value('profile_photo');
            $update['profile_photo'] = image_helper_compress_and_store($request->file('profile_photo'), 'profiles', 600, 600);
            image_helper_delete($existing);
        }

        DB::table('customers')->where('id', $customerId)->update($update);

        return redirect()->route('profile')->with('status', 'Profile updated successfully.');
    }
}
