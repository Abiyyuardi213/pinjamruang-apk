@extends('layouts.app')

@section('title', 'Dashboard - Pinjam Ruang ITATS')

@section('content')
    <section class="relative overflow-hidden bg-white px-5 py-20 lg:px-8">
        <div class="spotlight-grid absolute inset-0"></div>
        <div class="relative mx-auto max-w-7xl">
            <div data-reveal>
                <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Showcase tampilan aplikasi</p>
                <h1 class="mt-3 max-w-4xl text-4xl font-black text-slate-950 md:text-5xl">Tampilan utama yang bisa dijelaskan saat presentasi</h1>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @foreach ([
                    ['title' => 'Dashboard admin', 'items' => ['Total ruangan', 'Ruangan digunakan', 'Akses cepat', 'Aktivitas terbaru']],
                    ['title' => 'Scan QR', 'items' => ['QR ruang', 'QR dosen', 'Validasi peminjaman', 'Validasi pengembalian']],
                    ['title' => 'Monitoring ruang', 'items' => ['Status tersedia', 'Memiliki jadwal', 'Sedang dipinjam', 'Perlu perhatian']],
                    ['title' => 'Daftar peminjaman', 'items' => ['Data peminjam', 'Waktu ambil kunci', 'Status kembali', 'Edit data']],
                    ['title' => 'Dashboard dosen', 'items' => ['Jadwal mengajar', 'Status check-in', 'QR identitas', 'Akses riwayat']],
                    ['title' => 'Riwayat dosen', 'items' => ['Ruang digunakan', 'Tanggal aktivitas', 'Jam peminjaman', 'Catatan pengembalian']],
                ] as $screen)
                    <article class="shadcn-card rounded-lg p-5" data-reveal>
                        <div class="rounded-lg border border-slate-950/10 bg-white p-4 shadow-sm">
                            <div class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-red-400"></span>
                                <span class="h-3 w-3 rounded-full bg-yellow-400"></span>
                                <span class="h-3 w-3 rounded-full bg-emerald-500"></span>
                            </div>
                            <h2 class="mt-5 text-lg font-black text-slate-950">{{ $screen['title'] }}</h2>
                            <div class="mt-5 grid gap-3">
                                @foreach ($screen['items'] as $item)
                                    <div class="rounded-lg border border-slate-950/10 bg-slate-50 p-3 text-sm font-bold text-slate-700">{{ $item }}</div>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
