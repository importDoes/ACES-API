<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssessmentResult extends Model
{
    use SoftDeletes;

    protected $table = 'assessment_results';
    protected $primaryKey = 'assessment_result_id';

    protected $fillable = [
        'assessment_session_id',
        'highest_compatibility_score',
        'career_pathway_id',
        'generated_at',
    ];

    protected $casts = [
        'highest_compatibility_score' => 'decimal:2',
        'generated_at' => 'datetime',
    ];

    public function assessmentSession()
    {
        return $this->belongsTo(AssessmentSession::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function careerPathway()
    {
        return $this->belongsTo(CareerPathway::class, 'career_pathway_id', 'career_pathway_id');
    }
    //
}
