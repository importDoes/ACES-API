
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssessmentResponseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_session_id' => 'sometimes|required|exists:assessment_sessions,assessment_session_id',
            'assessment_question_id' => 'sometimes|required|exists:assessment_questions,assessment_question_id',
            'question_option_id' => 'sometimes|required|exists:question_options,question_option_id',
            'answer_text' => 'nullable|string',
            'answered_at' => 'nullable|date',
        ];
    }
}
