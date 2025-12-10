<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIntentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255|unique:intents,name,' . $this->route('id'),
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ];
    }
}
