<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Intent;

class IntentController extends Controller
{
    public function index()
    {
        $intents = Intent::where('is_active', true)
            ->orderBy('name')
            ->get();

        return ApiResponse::success($intents);
    }

    public function programs($id)
    {
        $intent = Intent::with(['programs' => function ($query) {
            $query->where('is_active', true)->with('university');
        }])->findOrFail($id);

        return ApiResponse::success($intent);
    }
}
