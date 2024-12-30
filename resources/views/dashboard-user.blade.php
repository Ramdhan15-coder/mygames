<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <!-- resources/views/dashboard_user.blade.php -->
    <h1>Selamat datang, {{ $username }}</h1>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
