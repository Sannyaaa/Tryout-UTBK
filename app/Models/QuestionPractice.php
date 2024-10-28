<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionPractice extends Model
{
    //

    protected $fillable = ['question', 'image', 'corect_answer', 'explanation', 'class_bimbel_id'];


    public function class_bimbel(){
        return $this->belongsTo(ClassBimbel::class);
    }

    public function answer(){
        return $this->hasOne(Answer::class);
    }
}
