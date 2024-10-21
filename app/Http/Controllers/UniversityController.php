<?php

namespace App\Http\Controllers;
use App\Models\Major;
use App\Models\University;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class UniversityController extends Controller
{
    //

    private $baseUrl = 'https://api-frontend.kemdikbud.go.id/v2/';

    // Mendapatkan semua Perguruan Tinggi
    public function getAllUniversities()
    {
        try {
            $response = Http::get($this->baseUrl . 'pt');
            
            if($response->successful()) {
                $universities = $response->json();
                
                // Simpan ke database
                foreach($universities['data'] as $uni) {
                    $university = University::updateOrCreate(
                        ['pddikti_id' => $uni['id']],
                        [
                            'name' => $uni['nama_pt'],
                            'code' => $uni['kode_pt'],
                            // 'status' => $uni['status'],
                            'city' => $uni['kota'],
                            'province' => $uni['provinsi'],
                            'website' => $uni['website'] ?? null,
                            // 'phone' => $uni['telepon'] ?? null,
                            // 'email' => $uni['email'] ?? null,
                        ]
                    );

                    $responseMajor = Http::get($this->baseUrl . 'pt/' . $university->code . '/prodi');
            
                    if($responseMajor->successful()) {
                        $majors = $responseMajor->json();
                        // $university = University::where('code', $kode_pt)->first();
                        
                        if($university) {
                            foreach($majors['data'] as $major) {
                                Major::updateOrCreate(
                                    [
                                        'university_id' => $university->id,
                                        'code' => $major['kode_prodi']
                                    ],
                                    [
                                        'name' => $major['nama_prodi'],
                                        // 'degree' => $major['jenjang'],
                                        'accreditation' => $major['akreditasi'] ?? null,
                                        // 'status' => $major['status']
                                    ]
                                );
                            }
                            
                            return response()->json([
                                'success' => true,
                                'message' => 'Data prodi berhasil diperbarui',
                                'count' => count($majors['data'])
                            ]);
                        }
                        
                        return response()->json([
                            'success' => false,
                            'message' => 'Universitas tidak ditemukan'
                        ], 404);
                    }
                }
                
                return response()->json([
                    'success' => true,
                    'message' => 'Data universitas berhasil diperbarui',
                    'count' => count($universities['data'])
                ]);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data dari PDDIKTI'
            ], 500);
            
        } catch(\Exception $e) {
            Log::error('Error getting universities: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    // Mendapatkan detail satu Perguruan Tinggi
    public function getUniversityDetail($kode_pt)
    {
        try {
            $response = Http::get($this->baseUrl . 'pt/' . $kode_pt);
            
            if($response->successful()) {
                return response()->json([
                    'success' => true,
                    'data' => $response->json()['data']
                ]);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
            
        } catch(\Exception $e) {
            Log::error('Error getting university detail: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan'
            ], 500);
        }
    }

    // Mendapatkan prodi/jurusan dari suatu PT
    public function getUniversityMajors($kode_pt)
    {
        try {
            $response = Http::get($this->baseUrl . 'pt/' . $kode_pt . '/prodi');
            
            if($response->successful()) {
                $majors = $response->json();
                $university = University::where('code', $kode_pt)->first();
                
                if($university) {
                    foreach($majors['data'] as $major) {
                        Major::updateOrCreate(
                            [
                                'university_id' => $university->id,
                                'code' => $major['kode_prodi']
                            ],
                            [
                                'name' => $major['nama_prodi'],
                                'degree' => $major['jenjang'],
                                'accreditation' => $major['akreditasi'] ?? null,
                                'status' => $major['status']
                            ]
                        );
                    }
                    
                    return response()->json([
                        'success' => true,
                        'message' => 'Data prodi berhasil diperbarui',
                        'count' => count($majors['data'])
                    ]);
                }
                
                return response()->json([
                    'success' => false,
                    'message' => 'Universitas tidak ditemukan'
                ], 404);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data prodi'
            ], 500);
            
        } catch(\Exception $e) {
            Log::error('Error getting majors: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan'
            ], 500);
        }
    }

    // Update semua data (PT dan Prodi)
    public function updateAllData()
    {
        try {
            // 1. Ambil semua PT
            $universities = $this->getAllUniversities();
            
            // 2. Untuk setiap PT, ambil data prodinya
            $universities = University::all();
            foreach($universities as $university) {
                $this->getUniversityMajors($university->code);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Semua data berhasil diperbarui'
            ]);
            
        } catch(\Exception $e) {
            Log::error('Error updating all data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data'
            ], 500);
        }
    }
}
