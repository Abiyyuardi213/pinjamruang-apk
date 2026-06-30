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

            <div class="shadcn-surface mt-12 overflow-hidden rounded-lg p-5 md:p-8" data-showcase-slider data-reveal>
                <div class="relative overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-out" data-showcase-track>
                        @foreach ([
                            ['title' => 'Dashboard admin', 'body' => 'Admin langsung melihat total ruangan, jumlah ruangan yang sedang digunakan, akses cepat, dan aktivitas terbaru dalam satu layar.', 'items' => ['Total ruangan', 'Ruangan digunakan', 'Akses cepat', 'Aktivitas terbaru']],
                            ['title' => 'Scan QR', 'body' => 'Proses peminjaman dan pengembalian kunci dilakukan dengan scan QR ruang dan QR dosen agar validasi lebih cepat.', 'items' => ['QR ruang', 'QR dosen', 'Validasi peminjaman', 'Validasi pengembalian']],
                            ['title' => 'Monitoring ruang', 'body' => 'Admin dapat memantau status ruang secara real-time untuk melihat ruang yang tersedia, terjadwal, atau sedang dipinjam.', 'items' => ['Status tersedia', 'Memiliki jadwal', 'Sedang dipinjam', 'Perlu perhatian']],
                            ['title' => 'Daftar peminjaman', 'body' => 'Semua transaksi peminjaman kunci tercatat rapi sehingga admin mudah melihat peminjam, waktu ambil, dan status kembali.', 'items' => ['Data peminjam', 'Waktu ambil kunci', 'Status kembali', 'Edit data']],
                            ['title' => 'Dashboard dosen', 'body' => 'Dosen dapat melihat jadwal mengajar hari ini, status check-in, QR identitas, dan akses cepat ke riwayat.', 'items' => ['Jadwal mengajar', 'Status check-in', 'QR identitas', 'Akses riwayat']],
                            ['title' => 'Riwayat dosen', 'body' => 'Riwayat penggunaan ruang membantu dosen dan admin melihat aktivitas ruang yang pernah digunakan.', 'items' => ['Ruang digunakan', 'Tanggal aktivitas', 'Jam peminjaman', 'Catatan pengembalian']],
                        ] as $screen)
                            <article class="grid min-w-full items-center gap-8 lg:grid-cols-[.9fr_1.1fr]">
                                <div class="relative order-2 lg:order-1">
                                    <div class="absolute inset-x-14 bottom-4 h-16 rounded-full bg-slate-950/15 blur-2xl"></div>
                                    <img
                                        src="{{ asset('images/mockup1side.png') }}"
                                        alt="Mockup {{ $screen['title'] }} Pinjam Ruang ITATS"
                                        class="relative mx-auto max-h-[620px] w-full max-w-xs object-contain lg:max-w-sm"
                                        loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                                    >
                                </div>

                                <div class="order-1 lg:order-2">
                                    <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Fitur {{ $loop->iteration }} dari 6</p>
                                    <h2 class="mt-3 text-3xl font-black text-slate-950 md:text-5xl">{{ $screen['title'] }}</h2>
                                    <p class="mt-5 max-w-xl text-base leading-8 text-slate-600">{{ $screen['body'] }}</p>

                                    <div class="mt-8 grid gap-3 sm:grid-cols-2">
                                        @foreach ($screen['items'] as $item)
                                            <div class="rounded-lg border border-slate-950/10 bg-white p-4 text-sm font-bold text-slate-700 shadow-sm">{{ $item }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="mt-8 flex flex-col gap-4 border-t border-slate-950/10 pt-5 md:flex-row md:items-center md:justify-between">
                    <div class="flex gap-2" data-showcase-dots>
                        @foreach (range(1, 6) as $dot)
                            <button type="button" class="h-2.5 w-2.5 rounded-full bg-slate-300 transition-all duration-300 first:w-8 first:bg-slate-950" data-showcase-dot="{{ $loop->index }}" aria-label="Lihat slide {{ $dot }}"></button>
                        @endforeach
                    </div>

                    <div class="flex gap-3">
                        <button type="button" class="shadcn-button border border-slate-950/10 bg-white px-4 py-2 text-sm text-slate-950 shadow-sm hover:bg-slate-50" data-showcase-prev>
                            Sebelumnya
                        </button>
                        <button type="button" class="shadcn-button bg-slate-950 px-4 py-2 text-sm text-white shadow-sm hover:bg-emerald-700" data-showcase-next>
                            Berikutnya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
