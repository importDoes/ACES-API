<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Indicator extends Model
{
    use SoftDeletes;

    protected $table = 'indicators';
    protected $primaryKey = 'indicator_id';

    protected $fillable = [
        'assessment_dimension_id',
        'indicator_code',
        'indicator_name',
        'indicator_type',
        'description',
    ];

    public function assessmentDimension()
    {
        return $this->belongsTo(AssessmentDimension::class, 'assessment_dimension_id', 'assesment_dimension_id');
    }

    public function assessmentQuestions()
    {
        return $this->hasMany(AssessmentQuestion::class, 'indicator_id', 'indicator_id');
    }

    public function optionIndicatorScores()
    {
        return $this->hasMany(OptionIndicatorScore::class, 'indicator_id', 'indicator_id');
    }

    public function learnerIndicatorScores()
    {
        return $this->hasMany(LearnerIndicatorScore::class, 'indicator_id', 'indicator_id');
    }

    public function pathwayIndicatorMappings()
    {
        return $this->hasMany(PathwayIndicatorMapping::class, 'indicator_id', 'indicator_id');
    }

    public function careerDecisionScores()
    {
        return $this->hasMany(CareerDecisionScore::class, 'indicator_id', 'indicator_id');
    }

    public function careerValuePreferences()
    {
        return $this->hasMany(CareerValuePreference::class, 'indicator_id', 'indicator_id');
    }
    //
}
