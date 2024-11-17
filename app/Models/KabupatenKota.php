<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name_kabupaten_kota',
        'provinsi_id'
    ];
    
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
    
    public function sekolah()
    {
        return $this->hasMany(Sekolah::class);
    }
}
