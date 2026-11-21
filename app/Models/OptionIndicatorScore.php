<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OptionIndicatorScore extends Model
{
    use SoftDeletes;

    protected $table = 'option_indicator_scores';
    protected $primaryKey = 'option_indicator_score_id';

    protected $fillable = [
        'question_option_id',
        'indicator_id',
        'score_value',
    ];

    public function questionOption()
    {
        return $this->belongsTo(QuestionOption::class, 'question_option_id', 'question_option_id');
    }

    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id', 'indicator_id');
    }
    //
}
