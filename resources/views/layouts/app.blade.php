<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="@yield('description', 'Website promosi Pinjam Ruang ITATS, aplikasi peminjaman dan monitoring ruang perkuliahan berbasis QR untuk admin dan dosen.')">

        <title>@yield('title', 'Pinjam Ruang ITATS')</title>

        <link rel="icon" type="image/png" href="{{ asset('images/Logo.png') }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/Logo.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/Logo.png') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen text-slate-950 antialiased">
        <x-navbar />

        <main id="page-transition" class="page-transition">
            @yield('content')
        </main>

        <x-footer />
    </body>
</html>
