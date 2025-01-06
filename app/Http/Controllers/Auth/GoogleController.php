<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

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
            // Mendapatkan data user dari Google
            $googleUser = Socialite::driver('google')->user();

            // Periksa apakah user sudah ada di database
            $currentUser = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if ($currentUser) {
                // Jika user sudah ada, lakukan login
                Auth::login($currentUser);
            } else {
                // Jika user belum ada, buat user baru
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt('123456dummy') // Menggunakan bcrypt untuk password dummy
                ]);

                // Login user baru
                Auth::login($newUser);
            }

            // Redirect ke halaman dashboard
            return redirect()->intended('dashboard-user');
            

        } catch (Exception $e) {
            // Log error dan redirect kembali ke halaman login dengan pesan error
            \Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('google.login')->with('error', 'Failed to login using Google. Please try again.');
        }
    }
}
