<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Redirect to Google for authentication.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle callback from Google.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
{
    try {
        // Tambahkan log setiap langkah
        \Log::info('Step 1: Masuk ke handleGoogleCallback');

        // Ambil informasi pengguna dari Google
        $googleUser = Socialite::driver('google')->stateless()->user();
        \Log::info('Step 2: Informasi Google didapat', ['googleUser' => $googleUser]);

        // Cari pengguna di database atau buat user baru
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'password' => bcrypt('google_default_password'),
                'role_id' => 3,
            ]
        );
        \Log::info('Step 3: User ditemukan atau dibuat', ['user' => $user]);

        // Login user
        Auth::login($user, true);
        \Log::info('Step 4: User berhasil login', ['userId' => $user->id]);

        // Redirect ke dashboard
        return redirect()->route('dashboard-user');
    } catch (\Exception $e) {
        \Log::error('Error during Google login', ['error' => $e->getMessage()]);
        return redirect()->route('login')->withErrors('Login dengan Google gagal. Silakan coba lagi.');
    }
}
}