<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class QuestionOption extends Model
{
    use SoftDeletes;

    protected $table = 'question_options';
    protected $primaryKey = 'question_option_id';

    protected $fillable = [
        'assessment_question_id',
        'student_id',
        'option_text',
        'sequence_number',
    ];

    public function assessmentQuestion()
    {
        return $this->belongsTo(AssessmentQuestion::class, 'assessment_question_id', 'assessment_question_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function assessmentResponses()
    {
        return $this->hasMany(AssessmentResponse::class, 'question_option_id', 'question_option_id');
    }

    public function optionIndicatorScores()
    {
        return $this->hasMany(OptionIndicatorScore::class, 'question_option_id', 'question_option_id');
    }
    //
}
