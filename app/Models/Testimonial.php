<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //

    protected $fillable = ['user_id', 'content', 'is_show', 'name','package_member_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function package_member(){
        return $this->belongsTo(Package_member::class);
    }
}
