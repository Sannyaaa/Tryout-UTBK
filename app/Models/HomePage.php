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

        'feature_title', 
        'feature_desc', 

        'tryout',
        'event',
        'bimbel',
        'discount',

        'about_us_title', 
        'about_us_desc', 
        'about_us_image',

        'package_title', 
        'package_desc', 

        'mentor_title', 
        'mentor_desc', 

        'testimonial_title', 
        'testimonial_desc', 

        'faq_title', 
        'faq_desc', 
    ];
}
