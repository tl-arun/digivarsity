<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapIntentsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'intent_ids' => 'required|array',
            'intent_ids.*' => 'exists:intents,id',
        ];
    }
}
