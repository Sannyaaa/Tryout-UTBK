<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bimbel extends Model
{
    //

    protected $fillable = ['name', 'description','link_group'];

    public function classBimbel()
    {
        return $this->hasMany(ClassBimbel::class);
    }
    
    public function package_member()
    {
        return $this->hasMany(Package_member::class);
    }
}
