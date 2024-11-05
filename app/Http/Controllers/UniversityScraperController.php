<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversityScraperController extends Controller
{
    public function fetchUniversities()
    {
        try {
            // URL dari repository GitHub tersebut
            $response = Http::get('https://raw.githubusercontent.com/sutanlab/kampus-scraper/master/data/universities.json');
            
            if ($response->successful()) {
                $universities = $response->json();
                
                foreach ($universities as $uniData) {
                    // Simpan Universitas
                    $university = University::firstOrCreate([
                        'name' => $uniData['name']
                    ]);
                }
                
                return response()->json([
                    'message' => 'Data universitas berhasil diimpor',
                    'total_universities' => University::count()
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function fetchStudyPrograms()
    {
        try {
            // URL prodi dari repository
            $response = Http::get('https://raw.githubusercontent.com/sutanlab/kampus-scraper/master/data/study-programs.json');
            
            if ($response->successful()) {
                $studyPrograms = $response->json();
                
                foreach ($studyPrograms as $prodiData) {
                    // Cari universitas berdasarkan nama
                    $university = University::where('name', $prodiData['university'])->first();
                    
                    if ($university) {
                        // Simpan Prodi
                        StudyProgram::firstOrCreate([
                            'university_id' => $university->id,
                            'name' => $prodiData['name']
                        ]);
                    }
                }
                
                return response()->json([
                    'message' => 'Data program studi berhasil diimpor',
                    'total_study_programs' => StudyProgram::count()
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
