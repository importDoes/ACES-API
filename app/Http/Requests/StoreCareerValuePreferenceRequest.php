<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCareerValuePreferenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_session_id' => 'required|exists:assessment_sessions,assessment_session_id',
            'indicator_id' => 'required|exists:indicators,indicator_id',
            'importance_level' => 'required|string|max:255',
            'score' => 'required|numeric|min:0',
        ];
    }
}
