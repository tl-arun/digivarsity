<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'program_id' => 'sometimes|exists:programs,id',
            'student_name' => 'sometimes|string|max:255',
            'before_role' => 'nullable|string|max:255',
            'after_role' => 'nullable|string|max:255',
            'message' => 'sometimes|string',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ];
    }
}
