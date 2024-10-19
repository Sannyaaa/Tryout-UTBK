<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tryout extends Model
{
    protected $fillable = ['nama', 'description', 'image', 'categories_id', 'start_date', 'end_date', 'class', 'price', 'batch_id'];
}
