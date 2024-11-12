<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $fillable = ['sekolah', 'provinsi', 'kabupaten_kota', 'provinsi_id', 'kabupaten_kota_id', 'bentuk'];

    public function user(){
        return $this->hasMany(User::class);
    }

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kabupatenkota(){
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_kota_id');
    }
}
