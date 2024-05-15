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
        // Cek apakah pengguna yang mencoba mengakses adalah admin
        if ($request->email == 'admin@email.com' && $request->password == 'admin') {
            // Autentikasi admin secara manual
            Auth::loginUsingId(2); // Misalnya, anggap saja admin memiliki ID 1

            // Lanjutkan ke permintaan berikutnya
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman dashboard admin
        return redirect(route('admin.home'));
    }
}
