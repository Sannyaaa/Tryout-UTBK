<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //

    protected $fillable = ['name', 'code', 'city', 'province', 'website'];

    public function majors()
    {
        return $this->hasMany(Major::class);
    }
}
