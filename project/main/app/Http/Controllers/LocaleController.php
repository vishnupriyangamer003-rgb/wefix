<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function set(Request $request, string $code)
    {
        if (in_array($code, SetLocale::SUPPORTED, true)) {
            $request->session()->put('locale', $code);
        }

        return redirect()->back();
    }
}
