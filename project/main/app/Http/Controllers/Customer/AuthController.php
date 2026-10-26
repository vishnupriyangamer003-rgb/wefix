<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

/**
 * Customer register/login/logout against the "web" guard's database provider
 * (customers table) — no Eloquent, see CLAUDE.md.
 */
class AuthController extends Controller
{
    public function showRegister()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('profile');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^[6-9][0-9]{9}$/', Rule::unique('customers', 'phone')],
            'email' => ['nullable', 'email', Rule::unique('customers', 'email')],
            'address' => ['required', 'string'],
            'taluk' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'regex:/^[0-9]{6}$/'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'phone.regex' => 'Enter a valid 10-digit mobile number.',
            'pincode.regex' => 'Enter a valid 6-digit pincode.',
        ]);

        DB::table('customers')->insert([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'] ?? null,
            'address' => $data['address'],
            'taluk' => $data['taluk'],
            'district' => $data['district'],
            'state' => $data['state'],
            'pincode' => $data['pincode'],
            'password' => Hash::make($data['password']),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Auth::guard('web')->attempt(['phone' => $data['phone'], 'password' => $data['password']]);

        return redirect()->route('profile')->with('status', 'Welcome! Your account has been created.');
    }

    public function showLogin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('profile');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone' => ['required', 'regex:/^[6-9][0-9]{9}$/'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::guard('web')->attempt(['phone' => $credentials['phone'], 'password' => $credentials['password'], 'status' => 1], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('profile'));
        }

        return back()->withErrors(['phone' => 'Invalid phone number or password.'])->onlyInput('phone');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
