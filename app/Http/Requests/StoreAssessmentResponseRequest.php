<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssessmentResponseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_session_id' => 'required|exists:assessment_sessions,assessment_session_id',
            'assessment_question_id' => 'required|exists:assessment_questions,assessment_question_id',
            'question_option_id' => 'required|exists:question_options,question_option_id',
            'answer_text' => 'nullable|string',
            'answered_at' => 'nullable|date',
        ];
    }
}
