<?php

namespace App\Http\Controllers;
use App\Models\Major;
use App\Models\University;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class UniversityController extends Controller
{
    //

    // private $baseUrl = 'https://api-frontend.kemdikbud.go.id/v2/';

    // // Mendapatkan semua Perguruan Tinggi
    // public function getAllUniversities()
    // {
    //     try {
    //         $response = Http::get($this->baseUrl . 'pt');
            
    //         if($response->successful()) {
    //             $universities = $response->json();
                
    //             // Simpan ke database
    //             foreach($universities['data'] as $uni) {
    //                 $university = University::updateOrCreate(
    //                     ['pddikti_id' => $uni['id']],
    //                     [
    //                         'name' => $uni['nama_pt'],
    //                         'code' => $uni['kode_pt'],
    //                         // 'status' => $uni['status'],
    //                         'city' => $uni['kota'],
    //                         'province' => $uni['provinsi'],
    //                         'website' => $uni['website'] ?? null,
    //                         // 'phone' => $uni['telepon'] ?? null,
    //                         // 'email' => $uni['email'] ?? null,
    //                     ]
    //                 );

    //                 $responseMajor = Http::get($this->baseUrl . 'pt/' . $university->code . '/prodi');
            
    //                 if($responseMajor->successful()) {
    //                     $majors = $responseMajor->json();
    //                     // $university = University::where('code', $kode_pt)->first();
                        
    //                     if($university) {
    //                         foreach($majors['data'] as $major) {
    //                             Major::updateOrCreate(
    //                                 [
    //                                     'university_id' => $university->id,
    //                                     'code' => $major['kode_prodi']
    //                                 ],
    //                                 [
    //                                     'name' => $major['nama_prodi'],
    //                                     // 'degree' => $major['jenjang'],
    //                                     'accreditation' => $major['akreditasi'] ?? null,
    //                                     // 'status' => $major['status']
    //                                 ]
    //                             );
    //                         }
                            
    //                         return response()->json([
    //                             'success' => true,
    //                             'message' => 'Data prodi berhasil diperbarui',
    //                             'count' => count($majors['data'])
    //                         ]);
    //                     }
                        
    //                     return response()->json([
    //                         'success' => false,
    //                         'message' => 'Universitas tidak ditemukan'
    //                     ], 404);
    //                 }
    //             }
                
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Data universitas berhasil diperbarui',
    //                 'count' => count($universities['data'])
    //             ]);
    //         }
            
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Gagal mengambil data dari PDDIKTI'
    //         ], 500);
            
    //     } catch(\Exception $e) {
    //         Log::error('Error getting universities: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }

    // // Mendapatkan detail satu Perguruan Tinggi
    // public function getUniversityDetail($kode_pt)
    // {
    //     try {
    //         $response = Http::get($this->baseUrl . 'pt/' . $kode_pt);
            
    //         if($response->successful()) {
    //             return response()->json([
    //                 'success' => true,
    //                 'data' => $response->json()['data']
    //             ]);
    //         }
            
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data tidak ditemukan'
    //         ], 404);
            
    //     } catch(\Exception $e) {
    //         Log::error('Error getting university detail: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan'
    //         ], 500);
    //     }
    // }

    // // Mendapatkan prodi/jurusan dari suatu PT
    // public function getUniversityMajors($kode_pt)
    // {
    //     try {
    //         $response = Http::get($this->baseUrl . 'pt/' . $kode_pt . '/prodi');
            
    //         if($response->successful()) {
    //             $majors = $response->json();
    //             $university = University::where('code', $kode_pt)->first();
                
    //             if($university) {
    //                 foreach($majors['data'] as $major) {
    //                     Major::updateOrCreate(
    //                         [
    //                             'university_id' => $university->id,
    //                             'code' => $major['kode_prodi']
    //                         ],
    //                         [
    //                             'name' => $major['nama_prodi'],
    //                             'degree' => $major['jenjang'],
    //                             'accreditation' => $major['akreditasi'] ?? null,
    //                             'status' => $major['status']
    //                         ]
    //                     );
    //                 }
                    
    //                 return response()->json([
    //                     'success' => true,
    //                     'message' => 'Data prodi berhasil diperbarui',
    //                     'count' => count($majors['data'])
    //                 ]);
    //             }
                
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Universitas tidak ditemukan'
    //             ], 404);
    //         }
            
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Gagal mengambil data prodi'
    //         ], 500);
            
    //     } catch(\Exception $e) {
    //         Log::error('Error getting majors: ' . $e->getMessage());
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan'
    //         ], 500);
    //     }
    // }

    public function fetchUniversities()
    {
        try {
            // Konfigurasi timeout yang lebih lama dan retry
            $response = Http::timeout(30)
                ->retry(3, 1000)
                ->get('https://api-frontend.kemdikbud.go.id/v2/pt');
            
            // Backup endpoint jika yang pertama gagal
            if (!$response->successful()) {
                $response = Http::timeout(30)
                    ->retry(3, 1000)
                    ->get('https://api-frontend.kemdikbud.go.id/hit/v2/pt');
            }

            if (!$response->successful()) {
                return response()->json([
                    'message' => 'Gagal mengambil data. API Kemdikbud sedang tidak responsif.',
                    'suggestion' => 'Coba gunakan endpoint alternatif atau tunggu beberapa saat'
                ], 500);
            }

            $universities = $response->json()['data'] ?? $response->json();
            $count = 0;

            foreach ($universities as $uni) {
                // Skip jika data tidak lengkap
                if (!isset($uni['kode']) || !isset($uni['nama'])) continue;

                // Simpan data universitas
                $university = University::updateOrCreate(
                    ['code' => $uni['kode']],
                    ['name' => $uni['nama']]
                );

                try {
                    // Ambil detail dengan timeout yang lebih lama
                    $prodiResponse = Http::timeout(20)
                        ->retry(2, 1000)
                        ->get("https://api-frontend.kemdikbud.go.id/v2/detail_pt/{$uni['kode']}");
                    
                    if ($prodiResponse->successful()) {
                        $prodiData = $prodiResponse->json();
                        
                        if (isset($prodiData['prodi'])) {
                            foreach ($prodiData['prodi'] as $prodi) {
                                Major::updateOrCreate(
                                    [
                                        'university_id' => $university->id,
                                        'name' => $prodi['nama']
                                    ],
                                    []
                                );
                            }
                        }
                    }
                } catch (\Exception $e) {
                    // Log error tapi lanjutkan proses
                    Log::warning("Gagal mengambil prodi untuk {$uni['nama']}: " . $e->getMessage());
                }

                $count++;

                // Tambah delay kecil untuk menghindari overload
                usleep(500000); // 0.5 detik
            }

            return response()->json([
                'message' => 'Berhasil mengambil data',
                'universities_processed' => $count,
                'note' => 'Beberapa prodi mungkin tidak terambil karena timeout'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage(),
                'suggestion' => 'Coba gunakan alternatif berikut:',
                'alternatives' => [
                    '1. Tunggu beberapa menit dan coba lagi',
                    '2. Gunakan VPN jika ada',
                    '3. Cek koneksi internet Anda',
                    '4. Hubungi admin jika masalah berlanjut'
                ]
            ], 500);
        }
    }

    public function getStaticUniversities()
    {
        $universities = [
            [
                'kode' => '001',
                'nama' => 'Universitas Indonesia',
                'kota' => 'Depok',
                'prodi' => ['Teknik Informatika', 'Sistem Informasi']
            ],
            // ... tambahkan data PTN lainnya
        ];

        foreach ($universities as $uni) {
            $university = University::updateOrCreate(
                ['code' => $uni['kode']],
                ['city' => $uni['kota']] ?? '',
                ['name' => $uni['nama']] ?? ''
            );

            foreach ($uni['prodi'] as $prodiName) {
                Major::updateOrCreate(
                    [
                        'university_id' => $university->id,
                        'name' => $prodiName
                    ],
                    []
                );
            }
        }

        return response()->json(['message' => 'Data berhasil diimport']);
    }

    public function getUniversities()
    {
        $universities = University::with('majors')->get();
        return response()->json($universities);
    }
}
