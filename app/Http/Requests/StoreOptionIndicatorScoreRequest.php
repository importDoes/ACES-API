<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionIndicatorScoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_option_id' => 'required|exists:question_options,question_option_id',
            'indicator_id' => 'required|exists:indicators,indicator_id',
            'score_value' => 'required|string|max:255',
        ];
    }
}
