<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package_member extends Model
{
    protected $fillable = ['name', 'description', 'image', 'price', 'tryout_id', 'bimbel_id'];

     public function Benefits(){
        return $this->hasMany(Benefit::class, 'package_member_id');
    }

    public function tryout(){
        return $this->belongsTo(Tryout::class);
    }

    public function bimbel(){
        return $this->belongsTo(Bimbel::class);
    }
}