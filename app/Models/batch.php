<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function tryout(){
        return $this->hasMany(tryout::class);
    }

    public function bimbel(){
        return $this->hasMany(Bimbel::class);
    }
}
