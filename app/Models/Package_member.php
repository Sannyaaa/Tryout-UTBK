<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package_member extends Model
{
    protected $fillable = ['name', 'description', 'image', 'price', 'tryout_id', 'bimbel_id'];

     public function benefits(){
        return $this->hasMany(Benefit::class, 'package_member_id');
    }

    public function tryout(){
        return $this->belongsTo(Tryout::class);
    }

    public function bimbel(){
        return $this->belongsTo(Bimbel::class);
    }

    public function discounts(){
        return $this->belongsToMany(Discount::class, 'discount_package_member');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
