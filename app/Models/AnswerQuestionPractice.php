<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerQuestionPractice extends Model
{
    //
    protected $fillable = [
        'question_practice_id', 'user_id', 'answer', 'result_practice_id'
    ];

    public function result_practice() {
        return $this->belongsTo(ResultPractice::class);
    }

    public function question_practice() {
        return $this->belongsTo(QuestionPractice::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
