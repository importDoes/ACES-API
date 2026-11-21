<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssessmentSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'sometimes|required|exists:students,id',
            'started_at' => 'sometimes|required|date',
            'completed_at' => 'nullable|date',
            'status' => 'sometimes|required|string|max:255',
        ];
    }
}
