<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyAutomationToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $expectedToken = config('services.automated_blog.token');
        $providedToken = $request->bearerToken();

        if (
            empty($expectedToken) ||
            empty($providedToken) ||
            !hash_equals($expectedToken, $providedToken)
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Accès non autorisé.',
            ], 401);
        }

        return $next($request);
    }
}
