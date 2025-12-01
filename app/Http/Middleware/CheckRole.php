<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Jika belum login
        if (!$request->user()) {
            return redirect('/login');
        }

        // Jika role user tidak ada dalam list allowed roles
        if (!in_array($request->user()->role, $roles)) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
