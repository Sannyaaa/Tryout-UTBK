<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultPractice extends Model
{
    //
    protected $fillable = ['user_id', 'class_bimbel_id', 'correct_answers', 'incorrect_answers', 'unanswered', 'score'];

    public function answer_question_practice() {
        return $this->hasMany(AnswerQuestionPractice::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function class_bimbel() {
        return $this->belongsTo(ClassBimbel::class);
    }
}
