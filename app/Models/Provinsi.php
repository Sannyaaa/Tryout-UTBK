<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'nama_provinsi',
    ];
    
    public function kabupatenKotas()
    {
        return $this->hasMany(KabupatenKota::class);
    }
    
    public function sekolah()
    {
        return $this->hasMany(Sekolah::class);
    }
}
