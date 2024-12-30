<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Top Up All Games</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
            body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Agar video berada di bawah konten */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4); /* Overlay hitam semi-transparan */
            z-index: 1; /* Overlay di atas video */
        }

        .register-card {
            background-color: rgba(255, 255, 255, 0.85); /* Mengurangi transparansi agar tidak terlalu terang */
            border-radius: 15px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 2; /* Login card tetap di atas overlay */
        }

        .btn-login {
            background-color: #007bff;
            color: white;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <video autoplay loop muted playsinline class="video-bg">
        <source src="{{ asset('assets/lings.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="register-card">
        <div class="register-header">
            <h3>Daftar Akun</h3>
            <p>Buat akun baru untuk mulai top-up game favoritmu!</p>
        </div>
        <div class="register-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                </div>
                <button type="submit" class="btn register-btn w-100">Daftar</button>
            </form>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

