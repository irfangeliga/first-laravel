<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authentification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->exists('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d') && !auth()->user()->is_admin) {
            return $next($request);
        }
        return redirect('login')->with("notification", ["Gagal", "Anda Belum Terverifikasi", "error"]);
    }
}
