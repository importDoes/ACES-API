<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssessmentQuestion extends Model
{
     use SoftDeletes;

    protected $table = 'assessment_questions';
    protected $primaryKey = 'assessment_question_id';

    protected $fillable = [
        'assessment_dimension_id',
        'indicator_id',
        'question_text',
        'response_type',
        'is_required',
        'sequence_number',
        'is_active',
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function assessmentDimension()
    {
        return $this->belongsTo(AssessmentDimension::class, 'assessment_dimension_id', 'assesment_dimension_id');
    }

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'indicator_id');
    }

    public function questionOptions()
    {
        return $this->hasMany(QuestionOption::class, 'assessment_question_id', 'assessment_question_id');
    }

    public function assessmentResponses()
    {
        return $this->hasMany(AssessmentResponse::class, 'assessment_question_id', 'assessment_question_id');
    }
    //
}
