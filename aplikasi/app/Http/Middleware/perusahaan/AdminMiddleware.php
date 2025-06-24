<?php

namespace App\Http\Middleware\perusahaan;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level === 'admin') {
            return $next($request);
        }

        return redirect()->route('admin.login_form')->withErrors('Anda tidak memiliki akses.');
    }
}
