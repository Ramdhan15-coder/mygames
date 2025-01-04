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

        body.dark-mode {
            background-color: #121212; /* Background dark mode */
            color: #e0e0e0; /* Teks warna terang */
        }

        .navbar.dark-mode {
            background-color: #1f1f1f; /* Navbar dark mode */
        }

        .card.dark-mode {
            background-color: #2c2c2c; /* Background card dalam dark mode */
        }

        footer.dark-mode {
            background-color: #1f1f1f; /* Footer dalam dark mode */
        }
    </style>
    @stack('styles') <!-- Tambahan untuk menambahkan CSS spesifik halaman -->
</head>
<body>
    <!-- Navbar with search bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Selamat datang, {{ $username }}</a>
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
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('riwayat') }}">Cek Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto" style="margin-right: 300px">
                <!-- Tombol Logout -->
                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                    <!-- Tombol Toggle Dark Mode -->
                    <li class="nav-item ms-2 d-flex align-items-center">
                        <label class="form-check-label me-2 text-white" for="darkModeSwitch">Dark Mode</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="darkModeSwitch" onchange="toggleDarkMode()">
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Content area -->
    <div class="container mt-4">
        @yield('content') <!-- Konten dinamis halaman -->
        <!-- Cards Section -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($kategoris as $kategori)
                <div class="col">
                    <div class="card h-100">
                        <!-- Tautkan gambar ke halaman order/create -->
                        <a href="{{ route('orders.create', ['kategori_id' => $kategori->id]) }}">
                            <img src="{{ Storage::url($kategori->image) }}" class="card-img-top custom-img w-100"
                                alt="{{ $kategori->nama }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $kategori->nama }}</h5>
                            <p class="card-text">{{ $kategori->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        @yield('footer') <!-- Footer yang bisa diubah per halaman -->
        <p>&copy; 2024 Top Up All Games | All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts') <!-- Tambahan untuk menambahkan JavaScript spesifik halaman -->
    <script>
        // Fungsi untuk toggle dark mode        FITUR 3 = DARKMODE
        function toggleDarkMode() {
            const body = document.body;
            const navbar = document.querySelectorAll('.navbar');
            const cards = document.querySelectorAll('.card');
            const footer = document.querySelector('footer');

            // Toggle class 'dark-mode' pada elemen body, navbar, cards, dan footer
            body.classList.toggle('dark-mode');
            navbar.forEach(nav => nav.classList.toggle('dark-mode'));
            cards.forEach(card => card.classList.toggle('dark-mode'));
            footer.classList.toggle('dark-mode');

            // Simpan preferensi pengguna di localStorage
            const isDarkMode = body.classList.contains('dark-mode');
            localStorage.setItem('darkMode', isDarkMode);

            // Update status switch berdasarkan mode
            document.getElementById('darkModeSwitch').checked = isDarkMode;
        }

        // Aktifkan dark mode berdasarkan preferensi yang tersimpan di localStorage
        document.addEventListener('DOMContentLoaded', () => {
            const isDarkMode = localStorage.getItem('darkMode') === 'true';
            if (isDarkMode) {
                toggleDarkMode();
            }
            document.getElementById('darkModeSwitch').checked = isDarkMode;
        });
    </script>
</body>
</html>
