<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Http\Resources\UniversityResource;
use App\Services\UniversityService;

class UniversityController extends Controller
{
    public function __construct(
        private UniversityService $service
    ) {}

    public function store(StoreUniversityRequest $request)
    {
        $university = $this->service->createUniversity($request->validated());

        return ApiResponse::success(
            new UniversityResource($university),
            'University created successfully',
            201
        );
    }

    public function update(UpdateUniversityRequest $request, int $id)
    {
        $this->service->updateUniversity($id, $request->validated());

        return ApiResponse::success(null, 'University updated successfully');
    }

    public function destroy(int $id)
    {
        $this->service->deleteUniversity($id);

        return ApiResponse::success(null, 'University deleted successfully');
    }
}
