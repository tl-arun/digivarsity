<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'type' => 'sometimes|in:online,odl,work-linked,executive',
            'description' => 'nullable|string',
            'curriculum' => 'nullable|string',
            'duration' => 'nullable|string|max:100',
            'mode' => 'nullable|string|max:100',
            'fees' => 'nullable|numeric|min:0',
            'eligibility' => 'nullable|string',
            'university_id' => 'sometimes|exists:universities,id',
            'intent_id' => 'nullable|exists:intents,id',
            'outcome_id' => 'nullable|exists:outcomes,id',
            'intent_tags' => 'nullable|array',
            'outcome_tags' => 'nullable|array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'image_url' => 'nullable|string|max:500',
        ];
    }
}
