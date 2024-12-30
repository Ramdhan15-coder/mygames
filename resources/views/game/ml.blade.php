<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Mobile Legends</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('assets/fanny_bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Memastikan body mengisi seluruh tinggi layar */
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            flex-grow: 1; /* Mengisi ruang yang tersedia */
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for better contrast */
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 1.5rem;
        }

        .form-label {
            color: rgba(0, 0, 0, 0.8); /* Darker text for label */
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
        color: rgba(0, 0, 0, 0.9); /* Teks label lebih gelap, namun tidak terlalu hitam */
        font-size: 1.1rem;
    }

    .diamond-option input:checked + label {
        font-weight: bold; /* Membuat label yang dipilih menjadi tebal */
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
    top: 20px; /* Jarak dari atas */
    left: 20px; /* Jarak dari kiri */
}

.navbar-button:hover {
    background-color: darkred;
}
    </style>
</head>
<body>

    <!-- Navbar Button -->
    <div class="container">
        <a href="{{ route('dashboard-user') }}">
            <button class="navbar-button">Dashboard</button>
        </a>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Top Up Mobile Legends
            </div>
            <form action="{{ route('game.ml') }}" method="POST">
                @csrf
                <!-- Pilihan jumlah diamond -->
                <div class="mb-3">
                    <label class="form-label">Pilih Jumlah Diamond</label>
                    <div class="diamond-option">
                        <input type="radio" id="diamond1" name="amount" value="100" required>
                        <label for="diamond1">100 Diamond</label>
                    </div>
                    <div class="diamond-option">
                        <input type="radio" id="diamond2" name="amount" value="250">
                        <label for="diamond2">250 Diamond</label>
                    </div>
                    <div class="diamond-option">
                        <input type="radio" id="diamond3" name="amount" value="500">
                        <label for="diamond3">500 Diamond</label>
                    </div>
                    <div class="diamond-option">
                        <input type="radio" id="diamond4" name="amount" value="1000">
                        <label for="diamond4">1000 Diamond</label>
                    </div>
                    <div class="diamond-option">
                        <input type="radio" id="diamond5" name="amount" value="2000">
                        <label for="diamond5">2000 Diamond</label>
                    </div>
                    <div class="diamond-option">
                        <input type="radio" id="diamond6" name="amount" value="5000">
                        <label for="diamond6">5000 Diamond</label>
                    </div>
                </div>
                <!-- Tombol submit untuk transaksi -->
                <button type="submit" class="btn btn-submit">Top Up</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        @yield('footer') <!-- Footer yang bisa diubah per halaman -->
        <p>&copy; 2024 Top Up All Games | All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
