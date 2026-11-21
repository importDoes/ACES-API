<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoadmapStepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'career_intervention_id' => 'sometimes|required|exists:career_interventions,career_intervention_id',
            'step_number' => 'sometimes|required|integer|min:1',
            'step_title' => 'sometimes|required|string|max:255',
            'step_description' => 'sometimes|required|string',
            'suggested_resource' => 'nullable|string|max:255',
            'completion_status' => 'sometimes|required|string|max:255',
        ];
    }
}
