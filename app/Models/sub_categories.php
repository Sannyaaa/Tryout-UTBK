<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_categories extends Model
{
<<<<<<< HEAD
    protected $fillable = ['name', 'description', 'duration', 'categories_id'];

    public function question(){
=======
    protected $fillable = ['name', 'description', 'duration', 'category'];

    public function question()
    {
>>>>>>> fe058d046dabff0ee8677f308b5ab478725d45b5
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


