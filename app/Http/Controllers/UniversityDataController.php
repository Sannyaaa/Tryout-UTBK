<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UniversityDataController extends Controller
{
    public function fetchUniversityData()
    {
        try {
            DB::beginTransaction();

            // Ganti URL dengan API yang sesuai
            $response = Http::get('https://akademik.untad.ac.id/api/universitas');
            
            if ($response->successful()) {
                $universities = $response->json();
                
                foreach ($universities as $uniData) {
                    // Simpan Universitas
                    $university = University::firstOrCreate(
                        ['name' => $uniData['name']]
                    );
                    
                    // Ambil Prodi untuk Universitas ini
                    $this->fetchStudyPrograms($university, $uniData['name']);
                }
                
                DB::commit();
                return response()->json([
                    'message' => 'Data universitas dan prodi berhasil diimpor',
                    'total_universities' => University::count(),
                    'total_study_programs' => StudyProgram::count()
                ]);
            }

            DB::rollBack();
            return response()->json(['error' => 'Gagal mengambil data'], 400);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal mengambil data: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function fetchStudyPrograms($university, $universityName)
    {
        try {
            // Ganti URL dengan API yang valid untuk prodi
            $response = Http::get("https://akademik.untad.ac.id/api/universitas/{$universityName}");
            
            if ($response->successful()) {
                $studyPrograms = $response->json();
                
                foreach ($studyPrograms as $prodiData) {
                    StudyProgram::firstOrCreate(
                        [
                            'university_id' => $university->id,
                            'name' => $prodiData['name']
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            Log::error("Gagal mengambil prodi untuk {$universityName}: " . $e->getMessage());
        }
    }

    // Tambahan: Fungsi untuk menampilkan data
    public function listUniversitiesWithPrograms()
    {
        $universities = University::with('studyPrograms')->get();
        return response()->json($universities);
    }
}
