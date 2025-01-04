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
        'role_id' => 2,
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



}
