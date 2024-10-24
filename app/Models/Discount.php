<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //

    protected $fillable = ['name', 'discount_value', 'code', 'description', 'discount_type', 'start_date', 'end_date'];
}
