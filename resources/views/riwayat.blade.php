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
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }

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
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container mt-4">
        <h3>Riwayat Pesanan</h3>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Akun</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th class="text-center">Diskon</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900">{{ $order->akun_game }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900">
                            {{ $order->produk->produk }} {{ $order->produk->satuan }}
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-900">{{ $order->quantity }}</td>
                        <td class="px-4 py-2 text-sm text-gray-900">
                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2 text-sm text-center">
                            @if (is_null($order->diskon))
                                <span class="text-danger">-</span>
                            @else
                                <span class="text-success">{{ $order->diskon }}%</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-900">
                            Rp {{ number_format($order->final_harga, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2 text-sm text-center">
                            @if ($order->status == 'Pending')
                                <span class="badge bg-secondary">{{ $order->status }}</span>
                            @elseif ($order->status == 'Terbayar')
                                <span class="badge bg-warning text-dark">{{ $order->status }}</span>
                            @elseif ($order->status == 'Berhasil')
                                <span class="badge bg-success text-dark">{{ $order->status }}</span>
                            @else
                                <span class="badge bg-danger">{{ $order->status }}</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-center text-gray-500">
                            Belum ada pesanan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        @yield('footer')
        <p>&copy; 2024 Top Up All Games | All rights reserved.</p>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
        function handleCardClick(game) {
            @auth
            window.location.href = `{{ url('game') }}/${game}`;
        @else
            window.location.href = "{{ route('login') }}";
        @endauth
        }
    </script>
</body>


</html>
