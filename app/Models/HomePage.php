<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    //

    protected $fillable = [
        'hero_title', 
        'hero_desc', 
        'hero_image',

        'tryout',
        'event',
        'bimbel',
        'discount',

        'about_us_title', 
        'about_us_desc', 
        'about_us_image',
    ];
}
