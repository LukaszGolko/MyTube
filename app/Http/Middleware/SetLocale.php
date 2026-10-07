<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $supportedLocales = config('app.supported_locales');
        $defaultLocale = config('app.locale');

        $locale =
            auth()->user()?->locale
            ?? $request->cookie('locale')
            ?? $request->getPreferredLanguage($supportedLocales)
            ?? $defaultLocale;

        if (!in_array($locale, $supportedLocales, true)) {
            $locale = $defaultLocale;
        }

        if (App::getLocale() !== $locale) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
