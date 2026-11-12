<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        if (!auth()->check()) {
            return redirect()->route('admin.login'); // ✅ Ça, c'est bon
        }

        return $next($request);
    }
}
