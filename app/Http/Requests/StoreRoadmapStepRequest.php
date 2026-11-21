<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoadmapStepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'career_intervention_id' => 'required|exists:career_interventions,career_intervention_id',
            'step_number' => 'required|integer|min:1',
            'step_title' => 'required|string|max:255',
            'step_description' => 'required|string',
            'suggested_resource' => 'nullable|string|max:255',
            'completion_status' => 'required|string|max:255',
        ];
    }
}
