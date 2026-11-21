<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePathwayIndicatorMappingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'career_pathway_id' => 'sometimes|required|exists:career_pathways,career_pathway_id',
            'indicator_id' => 'sometimes|required|exists:indicators,indicator_id',
            'mapping_score' => 'sometimes|required|numeric|min:0',
            'mapping_rationale' => 'nullable|string',
        ];
    }
}
