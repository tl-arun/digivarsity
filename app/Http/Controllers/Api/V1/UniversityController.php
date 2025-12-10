<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UniversityResource;
use App\Services\UniversityService;

class UniversityController extends Controller
{
    public function __construct(
        private UniversityService $service
    ) {}

    public function index()
    {
        $universities = $this->service->getAllUniversities();

        return ApiResponse::success(
            UniversityResource::collection($universities),
            'Universities retrieved successfully'
        );
    }
}
