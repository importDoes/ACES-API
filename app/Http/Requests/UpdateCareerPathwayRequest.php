<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCareerPathwayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $pathway = $this->route('careerPathway');

        $id = $pathway instanceof \App\Models\CareerPathway
            ? $pathway->career_pathway_id
            : $pathway;

        return [
            'pathway_code' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('career_pathways', 'pathway_code')->ignore($id, 'career_pathway_id'),
            ],
            'pathway_name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'sometimes|required|boolean',
        ];
    }
}
