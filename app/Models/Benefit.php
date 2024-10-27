<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $fillable = ['benefit', 'package_member_id'];

    public function package_member(){
        return $this->belongsTo(Package_member::class);
    }
}
