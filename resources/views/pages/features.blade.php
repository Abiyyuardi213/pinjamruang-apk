@extends('layouts.app')

@section('title', 'Fitur - Pinjam Ruang ITATS')

@section('content')
    <section class="relative overflow-hidden bg-white px-5 py-20 lg:px-8">
        <div class="spotlight-grid absolute inset-0"></div>
        <div class="relative mx-auto max-w-7xl">
            <div data-reveal>
                <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Fitur utama</p>
                <h1 class="mt-3 max-w-4xl text-4xl font-black text-slate-950 md:text-5xl">Fitur untuk validasi QR, monitoring ruang, dan riwayat penggunaan</h1>
            </div>
            <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Scan QR Ruang dan Dosen', 'body' => 'Admin memproses peminjaman atau pengembalian kunci dengan memindai QR ruang dan QR dosen.'],
                    ['title' => 'Validasi Jadwal Kuliah', 'body' => 'Sistem memeriksa apakah dosen memiliki jadwal pada ruang dan waktu yang sesuai.'],
                    ['title' => 'Dashboard Admin', 'body' => 'Menampilkan total ruang, ruang digunakan, akses cepat, aktivitas terbaru, dan menu pengelolaan.'],
                    ['title' => 'Monitoring Ruang', 'body' => 'Admin melihat status ruang: tersedia, memiliki jadwal, sedang dipinjam, atau perlu perhatian.'],
                    ['title' => 'Manajemen Peminjaman', 'body' => 'Admin melihat daftar peminjaman, menambah data manual, mengedit data, dan memantau status kembali.'],
                    ['title' => 'Dashboard Dosen', 'body' => 'Dosen melihat jadwal mengajar hari ini, status check-in, QR presensi, dan akses riwayat.'],
                    ['title' => 'Riwayat Penggunaan Ruang', 'body' => 'Setiap peminjaman dan pengembalian tersimpan sebagai riwayat digital.'],
                    ['title' => 'Data Ruang dan Mata Kuliah', 'body' => 'Aplikasi menampilkan data ruang, detail ruang, daftar mata kuliah, dan jadwal terkait.'],
                ] as $feature)
                    <article class="shadcn-card rounded-lg p-6" data-reveal>
                        <span class="grid h-11 w-11 place-items-center rounded-lg bg-slate-950 text-sm font-black text-white">{{ $loop->iteration }}</span>
                        <h2 class="mt-5 text-xl font-black text-slate-950">{{ $feature['title'] }}</h2>
                        <p class="mt-3 text-sm leading-7 text-slate-600">{{ $feature['body'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-6 px-5 py-20 lg:grid-cols-2 lg:px-8">
        <article class="shadcn-surface rounded-lg p-8" data-reveal>
            <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Fitur untuk Admin</p>
            <div class="mt-6 grid gap-3">
                @foreach (['Dashboard monitoring', 'Scan QR peminjaman', 'Scan QR pengembalian', 'Data ruang', 'Mapping jadwal', 'Daftar peminjaman', 'Aktivitas terbaru'] as $item)
                    <p class="rounded-lg border border-slate-950/10 bg-white p-4 text-sm font-bold text-slate-700 transition hover:border-emerald-600/30 hover:bg-emerald-50">{{ $item }}</p>
                @endforeach
            </div>
        </article>

        <article class="shadcn-surface rounded-lg p-8" data-reveal>
            <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Fitur untuk Dosen</p>
            <div class="mt-6 grid gap-3">
                @foreach (['Dashboard jadwal', 'QR identitas dosen', 'Status check-in', 'Riwayat peminjaman', 'Profil pengguna'] as $item)
                    <p class="rounded-lg border border-slate-950/10 bg-white p-4 text-sm font-bold text-slate-700 transition hover:border-emerald-600/30 hover:bg-emerald-50">{{ $item }}</p>
                @endforeach
            </div>
        </article>
    </section>
@endsection
