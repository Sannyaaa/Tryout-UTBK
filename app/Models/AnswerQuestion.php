<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
    protected $fillable = [
        'question_id', 'user_id', 'answer', 'result_id'
    ];

    public function result() {
        return $this->belongsTo(Result::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
