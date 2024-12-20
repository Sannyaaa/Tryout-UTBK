<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponentPage extends Model
{
    protected $table = 'component_pages';

    protected $fillable = ['navbar_image', 'footer_image', 'short_desc', 'facebook', 'instagram', 'tiktok', 'x', 'youtube', 'copyright', 'phone', 'email', 'address'];
}
