<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUniversitas extends Model
{
    protected $fillable = [
        'nama_universitas'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
    
    public function mentor(){
        return $this->hasMany(Mentor::class);
    }
}
