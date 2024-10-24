<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_categories extends Model
{
    protected $fillable = ['name', 'description', 'duration', 'category'];

<<<<<<< HEAD
    public function question(){
        return $this->hasMany(Question::class);
=======
    public function classBimbel()
    {
        return $this->hasMany(ClassBimbel::class);
>>>>>>> 0ee0fed27236126430bd8cf548eb4333e56f7280
    }
}


