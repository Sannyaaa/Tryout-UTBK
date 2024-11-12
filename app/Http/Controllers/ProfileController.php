<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\DataUniversitas;
use App\Models\KabupatenKota;
use App\Models\Provinsi;
use App\Models\Sekolah;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        try {
            // Mengambil input dari request
            Log::info('Data Universitas ID yang dikirim:', [
                'data_universitas_id' => $request->input('data_universitas_id'),
                'second_data_universitas_id' => $request->input('second_data_universitas_id'),
                'sekolah_id' => $request->input('sekolah_id'),
                'status' => $request->input('status'),
            ]);
        } catch (\Exception $e) {
            // Log error jika terjadi exception
            Log::error('Error saat mencatat data universitas: ' . $e->getMessage());
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }


        // dd($request);
        try {
            $request->user()->save();
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui profil user:', [
                'user_id' => $request->user()->id,
                'error' => $e->getMessage()
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
