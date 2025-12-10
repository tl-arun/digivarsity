<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'program_id' => 'nullable|exists:programs,id',
            'intent_id' => 'nullable|exists:intents,id',
            'outcome_id' => 'nullable|exists:outcomes,id',
            'source' => 'nullable|string|max:100',
            'notes' => 'nullable|string',
        ];
    }
}
