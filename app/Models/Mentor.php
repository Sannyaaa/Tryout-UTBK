<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = [
        'user_id', 'data_universitas_id',  'teach', 'description',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function data_universitas(){
        return $this->belongsTo(DataUniversitas::class);
    }

    public function achievements(){
        return $this->hasMany(Achievement::class, 'mentor_id');
    }
}
