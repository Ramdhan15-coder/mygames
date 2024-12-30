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
                <!-- Tombol Logout -->
                @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
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
            <!-- Card 1: Mobile Legends -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick('ml')">
                    <img src="{{ asset('assets/julian.jpg') }}" class="card-img-top custom-img w-100" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Mobile Legends</h5>
                        <p class="card-text">TopUp Mobile Legends</p>
                    </div>
                </div>
            </div>
            <!-- Card 2: Free Fire -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick('ff')">
                    <img src="{{ asset('assets/ff.jpg') }}" class="card-img-top custom-img w-100" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Free Fire</h5>
                        <p class="card-text">TopUp FreeFire</p>
                    </div>
                </div>
            </div>
            <!-- Card 3: PUBG -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick('pubg')">
                    <img src="{{ asset('assets/pubg.jpg') }}" class="card-img-top custom-img w-100" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">PUBG</h5>
                        <p class="card-text">TopUp PUBG</p>
                    </div>
                </div>
            </div>
            <!-- Card 4: Honor Of Kings -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick('hok')">
                    <img src="{{ asset('assets/hok.jpg') }}" class="card-img-top custom-img w-100" alt="Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Honor Of Kings</h5>
                        <p class="card-text">TopUp Honor Of Kings</p>
                    </div>
                </div>
            </div>
            <!-- Card 5: Genshin Impact -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick('genshin')">
                    <img src="{{ asset('assets/genshin.jpg') }}" class="card-img-top custom-img w-100" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Genshin Impact</h5>
                        <p class="card-text">TopUp Genshin Impact</p>
                    </div>
                </div>
            </div>
            <!-- Card 6: FC Mobile -->
            <div class="col">
                <div class="card h-100" onclick="handleCardClick('bola')">
                    <img src="{{ asset('assets/fc.jpg') }}" class="card-img-top custom-img w-100" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">FC Mobile</h5>
                        <p class="card-text">TopUp FC Mobile</p>
                    </div>
                </div>
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
        function handleCardClick(game) {
            // Cek apakah pengguna sudah login atau belum
            @auth
                // Jika sudah login, arahkan ke halaman game yang dipilih
                window.location.href = `{{ url('game') }}/${game}`;
            @else
                // Jika belum login, arahkan ke halaman login
                window.location.href = "{{ route('login') }}";
            @endauth
        }
    </script>
    
    
</body>
</html>
