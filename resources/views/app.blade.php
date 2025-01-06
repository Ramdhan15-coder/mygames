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
            height: 200px;
            /* Tinggi gambar */
            object-fit: cover;
            /* Memastikan gambar tetap proporsional */
        }

        .card {
            background-color: yellow;
            /* Background card tetap kuning */
            transition: transform 0.3s ease;
            /* Animasi saat hover */
        }

        .card:hover {
            transform: scale(1.05);
            /* Membesarkan card pas hover */
        }

        .card img {
            filter: grayscale(100%);
            /* Gambar abu-abu by default */
            transition: filter 0.3s ease;
            /* Animasi filter saat hover */
        }

        .card:hover img {
            filter: grayscale(0%);
            /* Warna asli gambar muncul pas hover */
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
            </ul>
            <ul class="navbar-nav ms-auto" style="margin-right: 300px; margin-left:1000px">
                <li class="nav-item">
                    <button onclick="window.location.href='{{ route('login') }}'" class="btn btn-warning btn-block">Masuk</button>
                </li>
                <li class="nav-item" style="margin-left: 7px">
                    <button onclick="window.location.href='{{ route('register') }}'" class="btn btn-outline-warning btn-block">Daftar</button>
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
                <img src="{{ asset('assets/julian.jpg') }}" class="card-img-top custom-img w-100" alt="Mobile Legends">
                <div class="card-body">
                    <h5 class="card-title">Mobile Legends</h5>
                    <p class="card-text">TopUp Mobile Legends</p>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/ff.jpg') }}" class="card-img-top custom-img w-100" alt="Free Fire">
                <div class="card-body">
                    <h5 class="card-title">Free Fire</h5>
                    <p class="card-text">TopUp FreeFire</p>
                </div>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/pubg.jpg') }}" class="card-img-top custom-img w-100" alt="PUBG">
                <div class="card-body">
                    <h5 class="card-title">PUBG</h5>
                    <p class="card-text">TopUp PUBG</p>
                </div>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/hok.jpg') }}" class="card-img-top custom-img w-100" alt="Honor Of Kings">
                <div class="card-body">
                    <h5 class="card-title">Honor Of Kings</h5>
                    <p class="card-text">TopUp Honor Of Kings</p>
                </div>
            </div>
        </div>
        <!-- Card 5 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/genshin.jpg') }}" class="card-img-top custom-img w-100" alt="Genshin Impact">
                <div class="card-body">
                    <h5 class="card-title">Genshin Impact</h5>
                    <p class="card-text">TopUp Genshin Impact</p>
                </div>
            </div>
        </div>
        <!-- Card 6 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/fc.jpg') }}" class="card-img-top custom-img w-100" alt="FC Mobile">
                <div class="card-body">
                    <h5 class="card-title">FC Mobile</h5>
                    <p class="card-text">TopUp FC Mobile</p>
                </div>
            </div>
        </div>
        <!-- Card 7 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/pokemon.jpg') }}" class="card-img-top custom-img w-100" alt="Pokemon GO">
                <div class="card-body">
                    <h5 class="card-title">Pokemon GO</h5>
                    <p class="card-text">TopUp Pokemon GO</p>
                </div>
            </div>
        </div>
        <!-- Card 8 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/fortnite.jpg') }}" class="card-img-top custom-img w-100" alt="Fortnite">
                <div class="card-body">
                    <h5 class="card-title">Fortnite</h5>
                    <p class="card-text">TopUp Fortnite</p>
                </div>
            </div>
        </div>
        <!-- Card 9 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/coc.jpg') }}" class="card-img-top custom-img w-100" alt="Clash of Clans">
                <div class="card-body">
                    <h5 class="card-title">Clash of Clans</h5>
                    <p class="card-text">TopUp Clash of Clans</p>
                </div>
            </div>
        </div>
        <!-- Card 10 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/codm.jpg') }}" class="card-img-top custom-img w-100" alt="COD Mobile">
                <div class="card-body">
                    <h5 class="card-title">Call of Duty Mobile</h5>
                    <p class="card-text">TopUp Call of Duty Mobile</p>
                </div>
            </div>
        </div>
        <!-- Card 11 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/apex.jpg') }}" class="card-img-top custom-img w-100" alt="Apex Legends Mobile">
                <div class="card-body">
                    <h5 class="card-title">Apex Legends Mobile</h5>
                    <p class="card-text">TopUp Apex Legends Mobile</p>
                </div>
            </div>
        </div>
        <!-- Card 12 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/amogus.jpg') }}" class="card-img-top custom-img w-100" alt="Among Us">
                <div class="card-body">
                    <h5 class="card-title">Among Us</h5>
                    <p class="card-text">TopUp Among Us</p>
                </div>
            </div>
        </div>
        <!-- Card 13 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/roblox.png') }}" class="card-img-top custom-img w-100" alt="Roblox">
                <div class="card-body">
                    <h5 class="card-title">Roblox</h5>
                    <p class="card-text">TopUp Roblox</p>
                </div>
            </div>
        </div>
        <!-- Card 14 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/ccrush.png') }}" class="card-img-top custom-img w-100" alt="Minecraft">
                <div class="card-body">
                    <h5 class="card-title">Candy Crush</h5>
                    <p class="card-text">TopUp Candy Crush</p>
                </div>
            </div>
        </div>
        <!-- Card 15 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/valo.jpg') }}" class="card-img-top custom-img w-100" alt="Valorant">
                <div class="card-body">
                    <h5 class="card-title">Valorant</h5>
                    <p class="card-text">TopUp Valorant</p>
                </div>
            </div>
        </div>
        <!-- Card 16 -->
        <div class="col">
            <div class="card h-100" onclick="handleCardClick()">
                <img src="{{ asset('assets/fortnite.jpg') }}" class="card-img-top custom-img w-100" alt="Fortnite">
                <div class="card-body">
                    <h5 class="card-title">Fortnite</h5>
                    <p class="card-text">TopUp Fortnite</p>
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

    <!-- Tambahkan ini dalam app.blade.php atau view tempat search berada -->
<script>
    document.getElementById('searchInput').addEventListener('keydown', function (event) {
        // Pastikan event hanya diproses jika tombol 'Enter' ditekan
        if (event.key === 'Enter') {
            event.preventDefault(); // Mencegah form submit jika ada
            const query = this.value; // Ambil nilai input
            const cardsContainer = document.getElementById('cards-container'); // Container produk
            
            if (query.length === 0) {
                // Jika input kosong, kosongkan hasil
                cardsContainer.innerHTML = '';
                return;
            }

            // Mengirim permintaan ke server untuk pencarian produk
            fetch(`/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    // Kosongkan container card
                    cardsContainer.innerHTML = '';

                    // Jika data ditemukan
                    if (data.length > 0) {
                        data.forEach(product => {
                            const card = `
                                <div class="col">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">${product.produk}</h5>
                                            <p class="card-text">Harga: Rp${product.harga}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            cardsContainer.innerHTML += card; // Tambahkan card ke container
                        });
                    } else {
                        cardsContainer.innerHTML = '<p class="text-center">Produk tidak ditemukan</p>';
                    }

                    // Setelah menambahkan produk ke dalam container, scroll ke produk
                    cardsContainer.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>

</body>

</html>
