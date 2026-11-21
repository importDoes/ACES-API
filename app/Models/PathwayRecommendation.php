<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PathwayRecommendation extends Model
{
    use SoftDeletes;

    protected $table = 'pathway_recommendations';
    protected $primaryKey = 'pathway_recommendation_id';

    protected $fillable = [
        'assessment_session_id',
        'career_pathway_id',
        'interest_alignment_score',
        'skills_alignment_score',
        'academic_alignment_score',
        'compatibility_score',
        'recommendation_rank',
        'is_primary',
    ];

    protected $casts = [
        'interest_alignment_score' => 'decimal:2',
        'skills_alignment_score' => 'decimal:2',
        'academic_alignment_score' => 'decimal:2',
        'compatibility_score' => 'decimal:2',
        'is_primary' => 'boolean',
    ];

    public function assessmentSession()
    {
        return $this->belongsTo(AssessmentSession::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function careerPathway()
    {
        return $this->belongsTo(CareerPathway::class, 'career_pathway_id', 'career_pathway_id');
    }

    public function careerInterventions()
    {
        return $this->hasMany(CareerIntervention::class, 'pathway_recommendation_id', 'pathway_recommendation_id');
    }
    //
}
