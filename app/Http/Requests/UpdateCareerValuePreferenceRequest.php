<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareerValuePreferenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_session_id' => 'sometimes|required|exists:assessment_sessions,assessment_session_id',
            'indicator_id' => 'sometimes|required|exists:indicators,indicator_id',
            'importance_level' => 'sometimes|required|string|max:255',
            'score' => 'sometimes|required|numeric|min:0',
        ];
    }
}
