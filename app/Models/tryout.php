<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tryout extends Model
{
    protected $fillable = ['nama', 'description', 'image', 'start_date', 'end_date', 'price', 'batch_id', 'categories', 'is_free'];
}
