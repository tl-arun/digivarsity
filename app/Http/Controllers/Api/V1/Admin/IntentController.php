<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIntentRequest;
use App\Http\Requests\UpdateIntentRequest;
use App\Http\Resources\IntentResource;
use App\Services\IntentService;

class IntentController extends Controller
{
    public function __construct(
        private IntentService $service
    ) {}

    public function store(StoreIntentRequest $request)
    {
        $intent = $this->service->createIntent($request->validated());

        return ApiResponse::success(
            new IntentResource($intent),
            'Intent created successfully',
            201
        );
    }

    public function update(UpdateIntentRequest $request, int $id)
    {
        $this->service->updateIntent($id, $request->validated());

        return ApiResponse::success(null, 'Intent updated successfully');
    }

    public function destroy(int $id)
    {
        $this->service->deleteIntent($id);

        return ApiResponse::success(null, 'Intent deleted successfully');
    }
}
