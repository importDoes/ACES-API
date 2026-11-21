<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AssessmentResponse extends Model
{
     use SoftDeletes;

    protected $table = 'assessment_responses';
    protected $primaryKey = 'assessment_response_id';

    protected $fillable = [
        'assessment_session_id',
        'assessment_question_id',
        'question_option_id',
        'answer_text',
        'answered_at',
    ];

    protected $casts = [
        'answered_at' => 'datetime',
    ];

    public function assessmentSession()
    {
        return $this->belongsTo(AssessmentSession::class, 'assessment_session_id', 'assessment_session_id');
    }

    public function assessmentQuestion()
    {
        return $this->belongsTo(AssessmentQuestion::class, 'assessment_question_id', 'assessment_question_id');
    }

    public function questionOption()
    {
        return $this->belongsTo(QuestionOption::class, 'question_option_id', 'question_option_id');
    }
    //
}
