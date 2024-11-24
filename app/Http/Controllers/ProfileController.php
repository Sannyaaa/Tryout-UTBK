<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Achievement;
use App\Models\DataUniversitas;
use App\Models\KabupatenKota;
use App\Models\Mentor;
use App\Models\Provinsi;
use App\Models\Sekolah;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)  
    {

        $user = $request->user();
        if(Gate::allows('admin')){
            // $search = $request->input('search');
    
                // Ambil data sekolah yang nama sekolahnya sesuai dengan pencarian
                $sekolah = Sekolah::when($request->has('search'), function ($query) use ($request) {
                    $query->where('sekolah', 'like', '%' . $request->search . '%');
                })->get();

                // return response()->json($sekolah);

                $university = DataUniversitas::all(); // Ambil data universitas (jika diperlukan)

                // Ambil data user untuk menampilkan data yang sudah ada
                return view('profile.edit', [
                    'user' => $request->user(),
                    // 'provinsi' => $provinsi,
                    // 'kota' => $kota,
                    'sekolah' => $sekolah,
                    'university' => $university
                ]);
        }elseif(Gate::allows('mentor')){

            $university = DataUniversitas::all(); // Ambil data universitas (jika diperlukan)

            $user->load(['mentor.achievements']);
            // Ambil data user untuk menampilkan data yang sudah ada
            return view('mentor.profile.edit', [
                'user' => $request->user(),
                'university' => $university
            ]);

        }
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        try {
            DB::beginTransaction();

            if(!Gate::allows('mentor')){
                $user = $request->user();

                // Update data umum (berlaku untuk admin dan mentor)
                $user->fill([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'tgl' => $request->tgl,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'status' => $request->status,
                    'data_universitas_id' => $request->data_universitas_id,
                    'second_data_universitas_id' => $request->second_data_universitas_id,
                    'sekolah_id' => $request->sekolah_id,
                ]);

                if ($user->isDirty('email')) {
                    $user->email_verified_at = null;
                }

                $user->save();
            }else {
                $user = $request->user();

                // Update data umum (berlaku untuk admin dan mentor)
                $user->fill([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'tgl' => $request->tgl,
                    'jenis_kelamin' => $request->jenis_kelamin,
                ]);

                if ($user->isDirty('email')) {
                    $user->email_verified_at = null;
                }

                $user->save();
            }

            // dd($request->user());


            // Logika tambahan untuk mentor
            if (Gate::allows('mentor')) {
                $mentor = Mentor::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'teach' => $request->teach,
                        'data_universitas_id' => $request->data_universitas_id,
                        'description' => $request->description,
                        ]
                    );
                    // dd($request);

                // Hapus achievement lama
                Achievement::where('mentor_id', $mentor->id)->delete();

                // Tambahkan achievement baru
                if ($request->has('achievements')) {
                    $achievements = collect($request->achievements)
                        ->filter(fn($a) => is_string($a) && !empty($a))
                        ->map(fn($a) => [
                            'mentor_id' => $mentor->id,
                            'achievement' => $a,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);

                    Achievement::insert($achievements->toArray());
                }
                DB::commit();

                return Redirect::route('mentor.profile.edit')->with('status', 'profile-updated');
            }

            if(Gate::allows('admin')){
                DB::commit();

                return Redirect::route('profile.edit')->with('status', 'profile-updated');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Profile update error:', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui profil']);
        }
    }




    // public function getProvinsi(Request $request)
    // {
    //     // Ambil semua data provinsi yang ada
    //     $provinsi = Provinsi::all();

    //     return response()->json($provinsi); // Kembalikan data dalam format JSON
    // }


    // public function getKabupaten(Request $request, $provinsi)
    // {
    //     // Ambil semua kabupaten yang berkaitan dengan provinsi yang dipilih
    //     $kabupaten = KabupatenKota::where('provinsi_id', $provinsi)->get();

    //     return response()->json($kabupaten); // Kembalikan data dalam format JSON
    // }


    // public function getSekolah(Request $request, $provinsi, $kabupaten)
    // {
    //     // Ambil semua sekolah berdasarkan provinsi dan kabupaten
    //     // Ambil sekolah dengan relasi provinsi dan kabupaten
    //     $sekolah = Sekolah::with(['provinsi', 'kabupatenKota'])
    //         ->where('provinsi_id', $provinsi)
    //         ->where('kabupaten_kota_id', $kabupaten)
    //         ->get();


    //     return response()->json($sekolah); // Kembalikan data dalam format JSON
    // }




    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
