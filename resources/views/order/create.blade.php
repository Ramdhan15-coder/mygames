<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up FreeFire</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('{{ asset('assets/ff_bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Memastikan body mengisi seluruh tinggi layar */
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            flex-grow: 1;
            /* Mengisi ruang yang tersedia */
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            /* Semi-transparent white */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Shadow for better contrast */
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 1.5rem;
        }

        .form-label {
            color: rgba(0, 0, 0, 0.8);
            /* Darker text for label */
            font-weight: bold;
            font-size: 1.2rem;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
            width: 100%;
        }

        .diamond-option {
            margin: 10px 0;
            display: flex;
            align-items: center;
        }

        .diamond-option input {
            margin-right: 10px;
        }

        .diamond-option label {
            color: rgba(0, 0, 0, 0.9);
            /* Teks label lebih gelap, namun tidak terlalu hitam */
            font-size: 1.1rem;
        }

        .diamond-option input:checked+label {
            font-weight: bold;
            /* Membuat label yang dipilih menjadi tebal */
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
            position: relative;
        }

        .navbar-button {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 20px;
            /* Jarak dari atas */
            left: 20px;
            /* Jarak dari kiri */
        }

        .navbar-button:hover {
            background-color: darkred;
        }
    </style>
</head>

<body>

    <!-- Navbar Button -->
    <div class="container">
        <a href="{{ route('dashboard') }}">
        <button class="navbar-button">Dashboard</button>
        </a>
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Buat Pesanan Baru
            </div>
            <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input Kategori ID -->
                <input type="hidden" name="kategori_id" value="{{ $kategori_id }}">

                <!-- Input ID Akun Game -->
                <div class="mb-3">
                    <label for="akun_game" class="form-label">ID Akun Game</label>
                    <input type="text" class="form-control" id="akun_game" name="akun_game" required>
                </div>

                <!-- Pilihan Produk -->
                <div class="mb-3">
                    <label for="produk" class="form-label">Produk/Layanan</label>
                    <select class="form-select" id="produk" name="produk_id" required>
                        <option value="" disabled selected>Pilih Produk</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">
                                {{ $produk->produk }} {{ $produk->satuan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1"
                        value="1" required>
                </div>

                <!-- Kupon -->
                <div class="mb-3">
                    <label for="kupon" class="form-label">Kupon</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="kupon" name="kupon">
                        <button type="button" class="btn btn-secondary" id="checkKupon">Check</button>
                    </div>
                    <div id="kuponFeedback" class="text-success mt-2" style="display: none;"></div>
                </div>

                <!-- Diskon -->
                <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon</label>
                    <input type="text" class="form-control" id="diskon" name="diskon" value="0%" readonly>
                </div>

                <!-- Total Harga -->
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga" value="0"
                        readonly>
                </div>

                <!-- Metode Pembayaran -->
                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                    <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                        <option value="transfer_bank">Transfer Bank</option>
                        <option value="e-wallet">E-Wallet</option>
                    </select>
                </div>

                <!-- Upload Bukti Pembayaran -->
                <div class="mb-3">
                    <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/dashboard-user';
                }
            });
        </script>
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const produkSelect = document.getElementById('produk');
            const quantityInput = document.getElementById('quantity');
            const kuponInput = document.getElementById('kupon');
            const checkKuponButton = document.getElementById('checkKupon');
            const kuponFeedback = document.getElementById('kuponFeedback');
            const diskonInput = document.getElementById('diskon');
            const totalHargaInput = document.getElementById('total_harga');

            let hargaProduk = 0;
            let diskonPersen = 0;

            const calculateTotal = () => {
                const quantity = parseInt(quantityInput.value) || 1;
                const totalHarga = hargaProduk * quantity;
                const diskon = totalHarga * (diskonPersen / 100);
                const finalHarga = totalHarga - diskon;

                totalHargaInput.value = `Rp ${finalHarga.toLocaleString('id-ID')}`;
            };

            produkSelect.addEventListener('change', () => {
                const selectedOption = produkSelect.options[produkSelect.selectedIndex];
                hargaProduk = parseInt(selectedOption.dataset.harga) || 0;
                calculateTotal();
            });

            quantityInput.addEventListener('input', calculateTotal);

            checkKuponButton.addEventListener('click', () => {
                const kodeKupon = kuponInput.value.trim();
                if (!kodeKupon) return;

                fetch(`/check-kupon?kode=${kodeKupon}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.valid) {
                            diskonPersen = data.diskon;
                            diskonInput.value = `${diskonPersen}%`;
                            kuponFeedback.style.display = 'block';
                            kuponFeedback.textContent =
                                `Kupon valid! Diskon ${diskonPersen}% diterapkan.`;
                            kuponFeedback.classList.remove('text-danger');
                            kuponFeedback.classList.add('text-success');
                        } else {
                            diskonPersen = 0;
                            diskonInput.value = '0%';
                            kuponFeedback.style.display = 'block';
                            kuponFeedback.textContent = 'Kupon tidak valid!';
                            kuponFeedback.classList.remove('text-success');
                            kuponFeedback.classList.add('text-danger');
                        }
                        calculateTotal();
                    })
                    .catch(error => {
                        console.error(error);
                        kuponFeedback.style.display = 'block';
                        kuponFeedback.textContent = 'Kupon tidak tersedia!';
                        kuponFeedback.classList.remove('text-success');
                        kuponFeedback.classList.add('text-danger');
                    });
            });
        });
    </script>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        @yield('footer') <!-- Footer yang bisa diubah per halaman -->
        <p>&copy; 2024 Top Up All Games | All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
