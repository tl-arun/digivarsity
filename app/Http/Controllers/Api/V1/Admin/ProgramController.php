<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MapIntentsRequest;
use App\Http\Requests\MapOutcomesRequest;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Http\Resources\ProgramResource;
use App\Services\ProgramService;

class ProgramController extends Controller
{
    public function __construct(
        private ProgramService $service
    ) {}

    public function store(StoreProgramRequest $request)
    {
        $data = $request->validated();

        // Handle file upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $program = $this->service->createProgram($data);

        return ApiResponse::success(
            new ProgramResource($program),
            'Program created successfully',
            201
        );
    }

    public function update(UpdateProgramRequest $request, int $id)
    {
        $data = $request->validated();

        // Handle file upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
        }

        $this->service->updateProgram($id, $data);

        return ApiResponse::success(null, 'Program updated successfully');
    }

    public function destroy(int $id)
    {
        $this->service->deleteProgram($id);

        return ApiResponse::success(null, 'Program deleted successfully');
    }

    public function mapIntents(MapIntentsRequest $request, int $id)
    {
        $this->service->mapIntents($id, $request->input('intent_ids'));

        return ApiResponse::success(null, 'Intents mapped successfully');
    }

    public function mapOutcomes(MapOutcomesRequest $request, int $id)
    {
        $this->service->mapOutcomes($id, $request->input('outcome_ids'));

        return ApiResponse::success(null, 'Outcomes mapped successfully');
    }
}
