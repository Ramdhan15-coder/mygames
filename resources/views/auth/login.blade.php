<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Top Up All Games</title>
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

        .login-card {
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
        <source src="{{ asset('assets/florin.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Login Form -->
    <div class="login-card">
        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success mb-3">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="text-center mb-4">Login</h3>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
        <p class="text-center mt-3">
            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
    </div>

    @if ($errors->any())
    <p style="color: red;">{{ $errors->first() }}</p>
    @endif

  

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>