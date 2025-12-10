<?php

namespace App\Http\Middleware;

use App\Helpers\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission)
    {
        if (!$request->user()) {
            return ApiResponse::error('Unauthenticated', 401);
        }

        if (!$request->user()->hasPermission($permission)) {
            return ApiResponse::error('Unauthorized. You do not have the required permission.', 403);
        }

        return $next($request);
    }
}
