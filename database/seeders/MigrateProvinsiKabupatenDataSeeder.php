<?php

namespace Database\Seeders;

use App\Models\KabupatenKota;
use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrateProvinsiKabupatenDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::transaction(function () {
            // Migrasi data provinsi
            $sekolahProvinsis = DB::table('sekolahs')
                ->select('provinsi')
                ->distinct()
                ->get();

            foreach ($sekolahProvinsis as $prov) {
                Provinsi::create([
                    'nama_provinsi' => $prov->provinsi
                ]);
            }

            // Migrasi data kabupaten_kota
            $sekolahKabupatens = DB::table('sekolahs')
                ->select('kabupaten_kota', 'provinsi')
                ->distinct()
                ->get();

            foreach ($sekolahKabupatens as $kab) {
                $provinsi = Provinsi::where('nama_provinsi', $kab->provinsi)->first();
                
                KabupatenKota::create([
                    'nama_kabupaten_kota' => $kab->kabupaten_kota,
                    'provinsi_id' => $provinsi->id
                ]);
            }

            // Update ID di tabel sekolah
            $sekolahs = DB::table('sekolahs')->get();
            
            foreach ($sekolahs as $sekolah) {
                $provinsi = Provinsi::where('nama_provinsi', $sekolah->provinsi)->first();
                $kabupaten = KabupatenKota::where('nama_kabupaten_kota', $sekolah->kabupaten_kota)
                    ->where('provinsi_id', $provinsi->id)
                    ->first();

                DB::table('sekolahs')
                    ->where('id', $sekolah->id)
                    ->update([
                        'provinsi_id' => $provinsi->id,
                        'kabupaten_kota_id' => $kabupaten->id
                    ]);
            }
        });
    }
}
