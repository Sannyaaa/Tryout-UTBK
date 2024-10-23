<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tryout extends Model
{
    protected $fillable = ['name', 'description', 'image', 'start_date', 'end_date', 'batch_id', 'is_free', 'is_together'];
    
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
}
