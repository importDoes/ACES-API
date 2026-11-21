<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CareerPathway extends Model
{
      use SoftDeletes;

    protected $table = 'career_pathways';
    protected $primaryKey = 'career_pathway_id';

    protected $fillable = [
        'pathway_code',
        'pathway_name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function pathwayIndicatorMappings()
    {
        return $this->hasMany(PathwayIndicatorMapping::class, 'career_pathway_id', 'career_pathway_id');
    }

    public function assessmentResults()
    {
        return $this->hasMany(AssessmentResult::class, 'career_pathway_id', 'career_pathway_id');
    }

    public function pathwayRecommendations()
    {
        return $this->hasMany(PathwayRecommendation::class, 'career_pathway_id', 'career_pathway_id');
    }
    //
}
