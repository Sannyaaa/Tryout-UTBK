<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_categories extends Model
{
    protected $fillable = ['name', 'description', 'duration', 'categories_id'];

    public function question(){
        return $this->hasMany(Question::class);
    }

    public function classBimbel()
    {
        return $this->hasMany(ClassBimbel::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id'  );
    }
}


