<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerPractice extends Model
{
    //

    protected $fillable = ['question_practice_id', 'a', 'b', 'c', 'd', 'e'];

    public function question_practice(){
        return $this->belongsTo(QuestionPractice::class);
    }
}
