<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    protected $fillable = ['university_id', 'name'];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
