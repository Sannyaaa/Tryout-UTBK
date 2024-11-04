<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function subcategories()
    {
        return $this->hasMany(sub_categories::class, 'categories_id');
    }
}
