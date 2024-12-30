<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Top Up All Games')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme for icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .custom-img {
            height: 200px; /* Tinggi gambar */
            object-fit: cover; /* Memastikan gambar tetap proporsional */
        }

        .card {
            background-color: yellow; /* Background card tetap kuning */
            transition: transform 0.3s ease; /* Animasi saat hover */
        }

        .card:hover {
            transform: scale(1.05); /* Membesarkan card pas hover */
        }

        .card img {
            filter: grayscale(100%); /* Gambar abu-abu by default */
            transition: filter 0.3s ease; /* Animasi filter saat hover */
        }

        .card:hover img {
            filter: grayscale(0%); /* Warna asli gambar muncul pas hover */
        }


    </style>
    @stack('styles') <!-- Tambahan untuk menambahkan CSS spesifik halaman -->
</head>
<body>
    <!-- Navbar with search bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Top Up All Games</a>
            <div class="d-flex w-100 mx-auto" style="max-width: 800px;">
                <input type="text" class="form-control me-2" placeholder="Search..." id="searchInput">
            </div>
        </div>
    </nav>

    <!-- Navigation Bar for Features -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Cek Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Cek Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto" style="margin-right: 300px">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}"class="btn btn-secondary">Daftar</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content area -->
    <div class="container mt-4">
        @yield('content') <!-- Konten dinamis halaman -->
        <!-- Cards Section -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick()">
                    <img src="{{ asset('assets/julian.jpg') }}" class="card-img-top custom-img w-100" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Mobile Legends</h5>
                        <p class="card-text">TopUp Mobile Legends</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick()">
                    <img src="{{ asset('assets/ff.jpg') }}" class="card-img-top custom-img w-100" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Free Fire</h5>
                        <p class="card-text">TopUp FreeFire</p>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick()">
                    <img src="{{ asset('assets/pubg.jpg') }}" class="card-img-top custom-img w-100" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">PUBG</h5>
                        <p class="card-text">TopUp PUBG</p>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick()">
                    <img src="{{ asset('assets/hok.jpg') }}" class="card-img-top custom-img w-100" alt="Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Honor Of Kings</h5>
                        <p class="card-text">TopUp Honor Of Kings</p>
                    </div>
                </div>
            </div>
            <!-- Card 1 -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick()">
                    <img src="{{ asset('assets/genshin.jpg') }}" class="card-img-top custom-img w-100" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Genshin Impact</h5>
                        <p class="card-text">TopUp Genshin Impact</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick()">
                    <img src="{{ asset('assets/fc.jpg') }}" class="card-img-top custom-img w-100" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">FC Mobile</h5>
                        <p class="card-text">TopUp FC Mobile</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
<footer class="bg-dark text-white text-center py-4 mt-5">
    @yield('footer') <!-- Footer yang bisa diubah per halaman -->
    
    <!-- Tambahkan peringatan dan tombol login di bawah footer utama -->
    <div class="container" id="footer-alert-container" style="display: none;">
        <div class="alert alert-warning" id="alert-message">
            <strong>Perhatian!</strong> Anda harus login untuk melanjutkan Proses TopUp
        </div>
        <a href="{{ route('login') }}" class="btn btn-primary mt-3" id="login-btn">Login</a>
    </div>

    <p>&copy; 2024 Top Up All Games | All rights reserved.</p>
</footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts') <!-- Tambahan untuk menambahkan JavaScript spesifik halaman -->
    <script>
        // Fungsi ini dipanggil saat card diklik
    function handleCardClick() {
    // Tampilkan peringatan
    document.getElementById('alert-message').style.display = 'block';

    // Tampilkan tombol login
    document.getElementById('login-btn').style.display = 'inline-block';

    // Tampilkan seluruh bagian footer yang berisi peringatan dan tombol login
    document.getElementById('footer-alert-container').style.display = 'block';

    // Scroll ke footer secara otomatis
    window.scrollTo({
        top: document.body.scrollHeight,
        behavior: 'smooth'
    });
}
    </script>
</body>
</html>