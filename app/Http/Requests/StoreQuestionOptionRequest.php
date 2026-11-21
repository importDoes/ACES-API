<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionOptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assessment_question_id' => 'required|exists:assessment_questions,assessment_question_id',
            'student_id' => 'required|exists:students,id',
            'option_text' => 'required|string|max:255',
            'sequence_number' => 'required|integer|min:1',
        ];
    }
}
