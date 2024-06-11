<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        if (Session::get('isAdmin') === true && Session::get('isAuthorize') === true) {
            return $next($request);
        }
        return redirect(route('login'))->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
