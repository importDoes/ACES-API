<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PathwayIndicatorMapping extends Model
{
     use SoftDeletes;

    protected $table = 'pathway_indicator_mappings';
    protected $primaryKey = 'pathway_indicator_mapping_id';

    protected $fillable = [
        'career_pathway_id',
        'indicator_id',
        'mapping_score',
        'mapping_rationale',
    ];

    protected $casts = [
        'mapping_score' => 'decimal:2',
    ];

    public function careerPathway()
    {
        return $this->belongsTo(CareerPathway::class, 'career_pathway_id', 'career_pathway_id');
    }

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'indicator_id');
    }
    //
}
