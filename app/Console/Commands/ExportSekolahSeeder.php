<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Sekolah; // Pastikan model Sekolah sudah dibuat
use Illuminate\Support\Facades\File;

class ExportSekolahSeeder extends Command
{
    protected $signature = 'export:sekolah-seeder';
    protected $description = 'Export data sekolah ke dalam format seeder';

    public function handle()
    {
        // Ambil semua data dari tabel sekolah
        $sekolah = Sekolah::all();
        
        // Buat template seeder
        $seederContent = "<?php\n\n";
        $seederContent .= "namespace Database\Seeders;\n\n";
        $seederContent .= "use Illuminate\Database\Seeder;\n";
        $seederContent .= "use Illuminate\Support\Facades\DB;\n\n";
        $seederContent .= "class SekolahSeeder extends Seeder\n";
        $seederContent .= "{\n";
        $seederContent .= "    public function run()\n";
        $seederContent .= "    {\n";
        $seederContent .= "        \$sekolah = [\n";

        // Convert setiap data ke format array PHP
        foreach ($sekolah as $item) {
            $seederContent .= "            [\n";
            $seederContent .= "                'id' => " . $item->id . ",\n";
            $seederContent .= "                'kode_prop' => '" . addslashes($item->kode_prop) . "',\n";
            $seederContent .= "                'provinsi' => '" . addslashes($item->provinsi) . "',\n";
            $seederContent .= "                'kode_kab_kota' => '" . addslashes($item->kode_kab_kota) . "',\n";
            $seederContent .= "                'kabupaten_kota' => '" . addslashes($item->kabupaten_kota) . "',\n";
            $seederContent .= "                'kode_kec' => '" . addslashes($item->kode_kec) . "',\n";
            $seederContent .= "                'kecamatan' => '" . addslashes($item->kecamatan) . "',\n";
            $seederContent .= "                'npsn' => '" . addslashes($item->npsn) . "',\n";
            $seederContent .= "                'sekolah' => '" . addslashes($item->sekolah) . "',\n";
            $seederContent .= "                'bentuk' => '" . addslashes($item->bentuk) . "',\n";
            $seederContent .= "                'status' => '" . addslashes($item->status) . "',\n";
            $seederContent .= "                'alamat_jalan' => '" . addslashes($item->alamat_jalan) . "',\n";
            $seederContent .= "                'lintang' => '" . addslashes($item->lintang) . "',\n";
            $seederContent .= "                'bujur' => '" . addslashes($item->bujur) . "',\n";
            $seederContent .= "            ],\n";
        }

        $seederContent .= "        ];\n\n";
        $seederContent .= "        DB::table('sekolah')->insert(\$sekolah);\n";
        $seederContent .= "    }\n";
        $seederContent .= "}\n";

        // Simpan ke file
        File::put(database_path('seeders/SekolahSeeder.php'), $seederContent);

        $this->info('Seeder berhasil dibuat!');
    }
}