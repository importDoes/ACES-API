<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLearnerIndicatorScoreRequest extends FormRequest
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
            'raw_score' => 'sometimes|required|numeric',
            'normalized_score' => 'sometimes|required|numeric',
        ];
    }
}
