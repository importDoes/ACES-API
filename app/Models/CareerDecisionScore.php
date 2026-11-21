<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CareerDecisionScore extends Model
{
     use SoftDeletes;

    protected $table = 'career_decision_scores';
    protected $primaryKey = 'career_decision_score_id';

    protected $fillable = [
        'assessment_session_id',
        'indicator_id',
        'score',
        'readiness_level',
    ];

    protected $casts = [
        'score' => 'decimal:2',
    ];

    public function assessmentSession()
    {
        return $this->belongsTo(AssessmentSession::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'indicator_id');
    }
    //
}
