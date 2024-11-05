<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerQuestion extends Model
{
    protected $fillable = [
        'question_id', 'user_id', 'answer'
    ];
}
