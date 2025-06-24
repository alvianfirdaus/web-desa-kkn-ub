<?php

namespace App\Http\Middleware\full_user;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AllUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user() && in_array(Auth::user()->level, ['admin', 'petugas', 'warga'])) {
            return $next($request);
        }

        return redirect()->route('warga.login_form')->withErrors('Akses ditolak.');
    }
}
