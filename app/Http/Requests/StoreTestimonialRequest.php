<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'program_id' => 'required|exists:programs,id',
            'student_name' => 'required|string|max:255',
            'before_role' => 'nullable|string|max:255',
            'after_role' => 'nullable|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ];
    }
}
