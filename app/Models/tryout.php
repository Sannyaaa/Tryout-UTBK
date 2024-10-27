<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tryout extends Model
{
    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'is_free', 'is_together'];

    public function question(){
        return $this->hasMany(Question::class);
    }

    public function package_member(){
        return $this->hasMany(package_member::class);
    }
}
