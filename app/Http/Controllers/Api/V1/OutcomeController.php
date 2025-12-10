<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Outcome;

class OutcomeController extends Controller
{
    public function index()
    {
        $outcomes = Outcome::where('is_active', true)
            ->orderBy('name')
            ->get();

        return ApiResponse::success($outcomes);
    }

    public function programs($id)
    {
        $outcome = Outcome::with(['programs' => function ($query) {
            $query->where('is_active', true)->with('university');
        }])->findOrFail($id);

        return ApiResponse::success($outcome);
    }
}
