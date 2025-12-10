<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutcomeRequest;
use App\Http\Requests\UpdateOutcomeRequest;
use App\Http\Resources\OutcomeResource;
use App\Services\OutcomeService;

class OutcomeController extends Controller
{
    public function __construct(
        private OutcomeService $service
    ) {}

    public function store(StoreOutcomeRequest $request)
    {
        $outcome = $this->service->createOutcome($request->validated());

        return ApiResponse::success(
            new OutcomeResource($outcome),
            'Outcome created successfully',
            201
        );
    }

    public function update(UpdateOutcomeRequest $request, int $id)
    {
        $this->service->updateOutcome($id, $request->validated());

        return ApiResponse::success(null, 'Outcome updated successfully');
    }

    public function destroy(int $id)
    {
        $this->service->deleteOutcome($id);

        return ApiResponse::success(null, 'Outcome deleted successfully');
    }
}
