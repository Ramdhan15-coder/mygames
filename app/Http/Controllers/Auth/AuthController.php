<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller; // Mengimpor Controller dari App\Http\Controllers
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;
use Exception;





class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($validated)) {

            $user = Auth::user();

            if ($user->role_id == 1) {
                return redirect()->route('users.index');
            } elseif ($user->role_id == 2) {
                return redirect()->route('order.index');
            }

            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Menampilkan form registrasi
    // Menampilkan form registrasi
public function showRegisterForm()
{
    return view('auth.register');
}

// Proses registrasi
public function register(Request $request): \Illuminate\Http\RedirectResponse
{
    // Validasi input data pendaftaran
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', 'min:8'],
    ]);

    // Log request untuk melihat apakah data sudah dikirim
    Log::info('Registering user', $request->all());

    // Simpan data user ke database
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => 3,
    ]);

    // Log apakah user berhasil disimpan
    Log::info('User created', ['user' => $user]);

    // Trigger event after user registered
    event(new Registered($user));

    // Redirect ke halaman login setelah berhasil mendaftar
    return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
}




public function dashboard()
{
    $username = Auth::user()->name; // Mendapatkan username dari user yang sedang login
    return view('dashboard-user', compact('username')); // Mengirim data ke view
}

public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Callback dari Google setelah user login
     */

public function handleGoogleCallback()
{
    try {
        // Ambil informasi pengguna dari Google
        $googleUser = Socialite::driver('google')->stateless()->user(); // Gunakan `stateless()` untuk mencegah masalah state

        // Log informasi untuk debugging (opsional)
        Log::info('Google User Info', ['googleUser' => $googleUser]);

        // Cari pengguna berdasarkan Google ID atau email
        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        // Jika pengguna belum ada, buat pengguna baru
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'role_id' => 3, // Role pengguna Google
                'password' => bcrypt('google_default_password'), // Password default jika diperlukan
            ]);
        }

        // Login pengguna ke aplikasi
        Auth::login($user);

        // Redirect ke dashboard-user
        return redirect()->route('dashboard-user');
    } catch (Exception $e) {
        // Log error untuk debugging
        Log::error('Google Callback Error', ['error' => $e->getMessage()]);

        // Redirect kembali ke halaman login jika ada error
        return redirect()->route('login')->with('error', 'Login dengan Google gagal. Silakan coba lagi.');
    }
}

}





