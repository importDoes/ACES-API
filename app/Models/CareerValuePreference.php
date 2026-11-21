<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CareerValuePreference extends Model
{
    use SoftDeletes;

    protected $table = 'career_value_preferences';
    protected $primaryKey = 'career_value_preference_id';

    protected $fillable = [
        'assessment_session_id',
        'indicator_id',
        'importance_level',
        'score',
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
