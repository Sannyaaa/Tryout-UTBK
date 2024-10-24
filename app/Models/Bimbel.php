<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bimbel extends Model
{
    //

    protected $fillable = ['name', 'description', 'batch_id'];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function classBimbel()
    {
        return $this->hasMany(ClassBimbel::class);
    }
}
