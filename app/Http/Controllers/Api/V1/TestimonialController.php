<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonialResource;
use App\Services\TestimonialService;

class TestimonialController extends Controller
{
    public function __construct(
        private TestimonialService $service
    ) {}

    public function index()
    {
        $testimonials = $this->service->getAllTestimonials();

        return ApiResponse::success(
            TestimonialResource::collection($testimonials),
            'Testimonials retrieved successfully'
        );
    }

    public function byProgram(int $programId)
    {
        $testimonials = $this->service->getTestimonialsByProgram($programId);

        return ApiResponse::success(
            TestimonialResource::collection($testimonials),
            'Testimonials retrieved successfully'
        );
    }
}
