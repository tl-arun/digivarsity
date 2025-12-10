<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapOutcomesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'outcome_ids' => 'required|array',
            'outcome_ids.*' => 'exists:outcomes,id',
        ];
    }
}
