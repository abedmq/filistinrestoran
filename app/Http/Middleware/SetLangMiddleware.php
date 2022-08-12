<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;

class SetLangMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $availableLangs = Language::active()->pluck('code');
        if ($availableLangs->search($request->header('Accept-Language')) !== false) {
            $lang = $availableLangs->search($request->header('Accept-Language'))->first();
            app()->setLocale($request->header('Accept-Language'));
        } elseif ($request->language && $availableLangs->search($request->language)) {
            $lang = $availableLangs->search($request->language)->first();
            app()->setLocale($request->language);
        } else {
            $lang = app('default_lang');
        }
        $lang->visitsCounter()->increment();

        return $next($request);
    }
}
