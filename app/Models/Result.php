<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['user_id', 'tryout_id', 'correct_answers', 'incorrect_answers', 'unanswered', 'score', 'sub_category_id'];

    public function answer_question() {
        return $this->hasMany(AnswerQuestion::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tryout() {
        return $this->belongsTo(Tryout::class);
    }

    public function sub_category() {
        return $this->belongsTo(sub_categories::class);
    }
}
 