<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('isAdmin')) {
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman login atau halaman lainnya
        return redirect(route('login'))->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
