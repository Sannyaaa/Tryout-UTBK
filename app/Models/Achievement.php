<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['achievement', 'mentor_id']; 

    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }
}
