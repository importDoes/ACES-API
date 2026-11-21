<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CareerIntervention extends Model
{
    use SoftDeletes;

    protected $table = 'career_interventions';
    protected $primaryKey = 'career_intervention_id';

    protected $fillable = [
        'pathway_recommendation_id',
        'intervention_description',
        'intervention_category',
        'priority_level',
    ];

    public function pathwayRecommendation()
    {
        return $this->belongsTo(PathwayRecommendation::class, 'pathway_recommendation_id', 'pathway_recommendation_id');
    }

    public function roadmapSteps()
    {
        return $this->hasMany(RoadmapStep::class, 'career_intervention_id', 'career_intervention_id');
    }
    //
}
