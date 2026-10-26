<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * Applies the customer's chosen locale (stored in session by the /lang/{code}
 * route) to every request. Defaults to config('app.locale') = 'en' when
 * nothing has been chosen yet. See CLAUDE.md multi-language section.
 */
class SetLocale
{
    public const SUPPORTED = ['en', 'ta', 'hi'];

    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale', config('app.locale'));

        if (!in_array($locale, self::SUPPORTED, true)) {
            $locale = config('app.locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
