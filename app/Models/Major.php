<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    //

    protected $fillable = [
        'university_code', 'name', 'code',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
