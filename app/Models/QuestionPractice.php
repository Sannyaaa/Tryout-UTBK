<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionPractice extends Model
{
    //

    protected $fillable = ['question', 'image', 'correct_answer', 'explanation', 'class_bimbel_id'];


    public function class_bimbel(){
        return $this->belongsTo(ClassBimbel::class);
    }

    public function answer_practice(){
        return $this->hasOne(AnswerPractice::class);
    }
}
