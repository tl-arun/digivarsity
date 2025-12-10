<?php

namespace App\Http\Middleware;

use App\Helpers\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        if (!$request->user()) {
            return ApiResponse::error('Unauthenticated', 401);
        }

        if (!$request->user()->hasAnyRole($roles)) {
            return ApiResponse::error('Unauthorized. Insufficient permissions.', 403);
        }

        return $next($request);
    }
}
