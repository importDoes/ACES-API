<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssessmentSession extends Model
{
    use SoftDeletes;

    protected $table = 'assessment_sessions';
    protected $primaryKey = 'assessment_session_id';

    protected $fillable = [
        'student_id',
        'started_at',
        'completed_at',
        'status',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function assessmentResponses()
    {
        return $this->hasMany(AssessmentResponse::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function learnerIndicatorScores()
    {
        return $this->hasMany(LearnerIndicatorScore::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function assessmentResults()
    {
        return $this->hasMany(AssessmentResult::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function pathwayRecommendations()
    {
        return $this->hasMany(PathwayRecommendation::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function careerDecisionScores()
    {
        return $this->hasMany(CareerDecisionScore::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function careerValuePreferences()
    {
        return $this->hasMany(CareerValuePreference::class, 'assessment_session_id', 'assessment_session_id');
    }
    //
}
