<?php

namespace App\Http\Middleware\admin_petugas;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleUser
{
    
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->level === 'admin' || Auth::user()->level === 'petugas')) {
            return $next($request);
        }

        return redirect()->route('petugas.login_form')->withErrors('Akses ditolak.');
    }
}
