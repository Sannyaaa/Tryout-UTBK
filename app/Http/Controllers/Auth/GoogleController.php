<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Download avatar
            $avatarPath = null;
            if ($googleUser->avatar) {
                $avatarContents = file_get_contents($googleUser->avatar);
                $avatarName = 'avatars/'.uniqid().'_avatar.jpg';
                
                // Simpan ke storage/app/public/avatars
                Storage::disk('public')->put($avatarName, $avatarContents);
                
                $avatarPath = $avatarName;
            }

            $user = User::updateOrCreate([
                'email' => $googleUser->email
            ], [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
                'avatar' => $avatarPath, // Simpan path relatif
                'password' => bcrypt(uniqid())
            ]);

            Auth::login($user);
            return redirect('/dashboard');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google authentication failed');
        }
    }
}