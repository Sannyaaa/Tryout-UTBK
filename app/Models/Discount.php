<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //

    protected $fillable = ['name', 'discount_value', 'code', 'description', 'discount_type', 'start_date', 'end_date'];

    public function package_members(){
        $this->belongsToMany(Package_member::class,'discount_package_member');
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
