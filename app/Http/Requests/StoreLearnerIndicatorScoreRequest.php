<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLearnerIndicatorScoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'learner_id' => ['required', 'integer', 'exists:learners,id'],
            'assessment_session_id' => ['required', 'integer', 'exists:assessment_sessions,id'],
            'indicator_id' => ['required', 'integer', 'exists:indicators,id'],
            'score' => ['required', 'numeric', 'min:0'],
        ];
    }
}
