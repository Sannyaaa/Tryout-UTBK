<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassBimbel extends Model
{
    //

    protected $fillable = ['bimbel_id', 'sub_categories_id', 'name', 'link_zoom', 'start_time', 'date', 'link_video', 'user_id', 'materi'];

    public function bimbel(){
        return $this->belongsTo(Bimbel::class);
    }

    public function sub_categories(){
        return $this->belongsTo(sub_categories::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
