<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_categories extends Model
{
    protected $fillable = ['name', 'description', 'duration', 'category'];
<<<<<<< HEAD
=======

>>>>>>> dfd9029f80f9460ebe77613824a10945f13507ff
    public function question(){
        return $this->hasMany(Question::class);
    }
    
    public function classBimbel()
    {
        return $this->hasMany(ClassBimbel::class);
    }
}


