<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckDatabase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            // Cek apakah ini IP kamu
            if ($request->ip() === 'ISI_DENGAN_IP_KAMU_DISINI') {
                return $next($request);
            }

            // Orang lain langsung ke halaman cantik
            return response()->view('errors.503', [], 503);
        }

        return $next($request);
    }
}
