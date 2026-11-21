<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssessmentSessionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'started_at' => 'required|date',
            'completed_at' => 'nullable|date|after_or_equal:started_at',
            'status' => 'required|string|max:255',
        ];
    }
}
