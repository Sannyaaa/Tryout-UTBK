<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_categories extends Model
{
    protected $fillable = ['name', 'description', 'duration', 'category'];

    public function classBimbel()
    {
        return $this->hasMany(ClassBimbel::class);
    }
}


