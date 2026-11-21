<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssessmentDimension extends Model
{
    use SoftDeletes;

    protected $table = 'assessment_dimensions';
    protected $primaryKey = 'assesment_dimension_id';

    protected $fillable = [
        'dimension_name',
        'description',
    ];

    public function indicators()
    {
        return $this->hasMany(Indicator::class, 'assessment_dimension_id', 'assesment_dimension_id');
    }

    public function assessmentQuestions()
    {
        return $this->hasMany(AssessmentQuestion::class, 'assessment_dimension_id', 'assesment_dimension_id');
    }
    //
}
