<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FixedApiToken
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
        $token = $request->header('Authorization') ?? $request->input('api_token');
        
        // Remove 'Bearer ' prefix if present
        if (strpos($token, 'Bearer ') === 0) {
            $token = substr($token, 7);
        }
        
        // Get fixed token from environment or use a default
        $fixedToken = env('FIXED_API_TOKEN', 'your-secret-api-token-here');
        
        if ($token !== $fixedToken) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized. Invalid API token.',
            ], 401);
        }
        
        return $next($request);
    }
}


