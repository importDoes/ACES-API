<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LearnerIndicatorScore extends Model
{ 
    use SoftDeletes;

    protected $table = 'learner_indicator_scores';
    protected $primaryKey = 'learner_indicator_score_id';

    protected $fillable = [
        'assessment_session_id',
        'indicator_id',
        'raw_score',
        'normalized_score',
    ];

    protected $casts = [
        'raw_score' => 'decimal:2',
        'normalized_score' => 'decimal:2',
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
