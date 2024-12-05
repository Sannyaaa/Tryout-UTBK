<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['image', 'is_show', 'start_date', 'end_date'];

}
