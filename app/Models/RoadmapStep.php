<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoadmapStep extends Model
{
    use SoftDeletes;

    protected $table = 'roadmap_steps';
    protected $primaryKey = 'roadmap_step_id';

    protected $fillable = [
        'career_intervention_id',
        'step_number',
        'step_title',
        'step_description',
        'suggested_resource',
        'completion_status',
    ];

    public function careerIntervention()
    {
        return $this->belongsTo(CareerIntervention::class, 'career_intervention_id', 'career_intervention_id');
    }
    //
}
