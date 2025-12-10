<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProgramResource;
use App\Services\ProgramService;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct(
        private ProgramService $service
    ) {}

    public function index(Request $request)
    {
        $filters = $request->only(['type', 'university_id', 'is_active', 'is_featured', 'per_page', 'limit']);
        $programs = $this->service->getAllPrograms($filters);

        return ApiResponse::success(
            ProgramResource::collection($programs)->response()->getData(true),
            'Programs retrieved successfully'
        );
    }

    public function show(int $id)
    {
        $program = $this->service->getProgram($id);

        if (!$program) {
            return ApiResponse::error('Program not found', 404);
        }

        return ApiResponse::success(
            new ProgramResource($program),
            'Program retrieved successfully'
        );
    }
}
