<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentPage extends Model
{
    //

    protected $fillable = ['navbar_image', 'footer_image', 'short_desc', 'facebook', 'instagram', 'tiktok', 'x', 'youtube', 'copyright', 'phone', 'email', 'address'];
}
