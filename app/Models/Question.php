<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['sub_categories_id', 'question', 'image', 'corect_answer', 'explanation', 'tryout_id'];

    public function sub_categories(){
        return $this->belongsTo(sub_categories::class);
    }

    public function tryout(){
        return $this->belongsTo(Tryout::class);
    }

    public function answer(){
        return $this->hasOne(Answer::class);
    }
}
