<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/admin/login');
        }

        if (auth()->user()->email !== 'tiefingsangare86@gmail.com') {
            abort(403, 'Accès non autorisé.');
        }

        return $next($request);
    }
}
