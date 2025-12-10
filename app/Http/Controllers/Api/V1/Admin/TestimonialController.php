<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Http\Resources\TestimonialResource;
use App\Services\TestimonialService;

class TestimonialController extends Controller
{
    public function __construct(
        private TestimonialService $service
    ) {}

    public function store(StoreTestimonialRequest $request)
    {
        $testimonial = $this->service->createTestimonial($request->validated());

        return ApiResponse::success(
            new TestimonialResource($testimonial),
            'Testimonial created successfully',
            201
        );
    }

    public function update(UpdateTestimonialRequest $request, int $id)
    {
        $this->service->updateTestimonial($id, $request->validated());

        return ApiResponse::success(null, 'Testimonial updated successfully');
    }

    public function destroy(int $id)
    {
        $this->service->deleteTestimonial($id);

        return ApiResponse::success(null, 'Testimonial deleted successfully');
    }
}
