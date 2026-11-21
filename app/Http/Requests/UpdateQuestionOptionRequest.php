<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionOptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_question_id' => 'sometimes|required|exists:assessment_questions,assessment_question_id',
            'student_id' => 'sometimes|required|exists:students,id',
            'option_text' => 'sometimes|required|string|max:255',
            'sequence_number' => 'sometimes|required|integer|min:1',
        ];
    }
}
