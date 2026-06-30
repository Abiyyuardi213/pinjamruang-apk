@extends('layouts.app')

@section('title', 'Pinjam Ruang ITATS - Digitalisasi Peminjaman Ruang Berbasis QR')

@section('content')
    <section class="relative overflow-hidden bg-white">
        <div class="spotlight-grid absolute inset-0"></div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-10 px-5 pb-16 pt-12 lg:grid-cols-[.98fr_1.02fr] lg:px-8 lg:pb-24 lg:pt-16">
            <div data-reveal>
                <div class="inline-flex items-center gap-2 rounded-full border border-slate-950/10 bg-white px-3 py-1.5 text-sm font-bold text-slate-700 shadow-sm">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    Digitalisasi peminjaman ruang perkuliahan berbasis QR
                </div>

                <h1 class="mt-7 max-w-4xl text-5xl font-black leading-tight text-slate-950 md:text-6xl">
                    Kelola Peminjaman Ruang Secara Cepat dan Terpantau
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">
                    Pinjam Ruang ITATS membantu admin dan dosen melakukan peminjaman, pengembalian, serta monitoring ruang perkuliahan menggunakan QR Code dan validasi jadwal kuliah.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('features') }}" class="shadcn-button bg-slate-950 px-6 py-3 text-sm text-white shadow-xl shadow-slate-950/15 hover:bg-emerald-700">Lihat Fitur</a>
                    <a href="{{ route('showcase') }}" class="shadcn-button border border-slate-950/10 bg-white px-6 py-3 text-sm text-slate-950 shadow-sm hover:border-emerald-600/30 hover:bg-emerald-50">Lihat Demo Aplikasi</a>
                </div>

                <div class="mt-10 grid max-w-2xl grid-cols-2 gap-3 md:grid-cols-4">
                    @foreach ([
                        ['value' => '100+', 'label' => 'Ruang Terdata'],
                        ['value' => '2', 'label' => 'Role Pengguna'],
                        ['value' => 'QR', 'label' => 'Based Validation'],
                        ['value' => 'Live', 'label' => 'Real-Time Monitoring'],
                    ] as $stat)
                        <div class="shadcn-surface rounded-lg p-4" data-reveal>
                            <p class="text-2xl font-black text-slate-950">{{ $stat['value'] }}</p>
                            <p class="mt-1 text-xs font-bold text-slate-500">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="relative" data-reveal>
                <img
                    src="{{ asset('images/mockup15.png') }}"
                    alt="Mockup aplikasi mobile Pinjam Ruang ITATS"
                    class="mx-auto w-full max-w-2xl object-contain lg:scale-110"
                    loading="eager"
                    fetchpriority="high"
                >
            </div>
        </div>
    </section>

    <section id="masalah" class="mx-auto max-w-7xl px-5 py-20 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-[.85fr_1.15fr]">
            <div data-reveal>
                <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Masalah yang diselesaikan</p>
                <h2 class="mt-3 text-3xl font-black text-slate-950 md:text-4xl">Pencatatan manual membuat penggunaan ruang sulit dipantau</h2>
                <p class="mt-5 text-sm leading-7 text-slate-600">
                    Proses peminjaman kunci ruang yang masih manual menyulitkan admin mengetahui siapa yang meminjam, kapan kunci diambil, kapan dikembalikan, dan apakah penggunaan ruang sesuai jadwal.
                </p>
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                @foreach ([
                    'Pencatatan peminjaman kunci masih manual',
                    'Sulit mengetahui ruang mana yang sedang digunakan',
                    'Riwayat peminjaman tidak selalu terdokumentasi rapi',
                    'Validasi dosen dan ruang membutuhkan waktu',
                    'Admin sulit memantau aktivitas ruang secara real-time',
                    'Penggunaan ruang perlu dicocokkan dengan jadwal kuliah',
                ] as $problem)
                    <div class="shadcn-card rounded-lg p-5" data-reveal>
                        <p class="text-sm font-bold leading-6 text-slate-700">{{ $problem }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="solusi" class="relative overflow-hidden bg-slate-950 px-5 py-20 text-white lg:px-8">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(16,185,129,.24),transparent_34rem)]"></div>
        <div class="relative mx-auto grid max-w-7xl gap-10 lg:grid-cols-[.9fr_1.1fr]">
            <div data-reveal>
                <p class="text-sm font-black uppercase tracking-normal text-emerald-300">Solusi aplikasi</p>
                <h2 class="mt-3 text-3xl font-black md:text-4xl">Validasi peminjaman dan pengembalian kunci dengan QR Code</h2>
                <p class="mt-5 text-sm leading-7 text-slate-300">
                    Admin cukup melakukan scan QR ruang dan QR dosen. Sistem mencatat transaksi secara digital, mencocokkan data dengan jadwal perkuliahan, lalu menampilkan status ruang melalui dashboard monitoring.
                </p>
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                @foreach ([
                    'Scan QR ruang untuk memilih ruangan',
                    'Scan QR dosen untuk validasi peminjam',
                    'Data peminjaman tersimpan ke API',
                    'Status ruang dipantau dari dashboard',
                    'Riwayat peminjaman dan pengembalian mudah dilacak',
                    'Jadwal kuliah menjadi dasar validasi penggunaan',
                ] as $solution)
                    <div class="rounded-lg border border-white/10 bg-white/[0.06] p-5 transition hover:border-emerald-400/40 hover:bg-white/[0.09]" data-reveal>
                        <p class="text-sm font-black leading-6">{{ $solution }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="manfaat" class="mx-auto max-w-7xl px-5 py-20 lg:px-8">
        <div class="max-w-2xl" data-reveal>
            <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Manfaat</p>
            <h2 class="mt-3 text-3xl font-black text-slate-950 md:text-4xl">Ambil kunci lebih cepat, penggunaan ruang lebih terpantau</h2>
        </div>
        <div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
            @foreach ([
                ['title' => 'Lebih Cepat', 'body' => 'Proses validasi peminjaman tidak perlu pencatatan manual.'],
                ['title' => 'Lebih Tertib', 'body' => 'Setiap transaksi peminjaman dan pengembalian tercatat digital.'],
                ['title' => 'Lebih Akurat', 'body' => 'Peminjaman divalidasi berdasarkan data dosen, ruang, dan jadwal.'],
                ['title' => 'Lebih Terpantau', 'body' => 'Admin dapat melihat ruang yang sedang digunakan melalui dashboard.'],
            ] as $benefit)
                <article class="shadcn-card rounded-lg p-6" data-reveal>
                    <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-600 text-sm font-black text-white">{{ $loop->iteration }}</div>
                    <h3 class="text-xl font-black text-slate-950">{{ $benefit['title'] }}</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-600">{{ $benefit['body'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section id="tentang" class="bg-white px-5 py-20 lg:px-8">
        <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-[.9fr_1.1fr]">
            <div data-reveal>
                <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Tentang aplikasi</p>
                <h2 class="mt-3 text-3xl font-black text-slate-950 md:text-4xl">Dibangun untuk admin dan dosen ITATS</h2>
                <p class="mt-5 text-sm leading-7 text-slate-600">
                    Bagi dosen, aplikasi menyediakan akses cepat untuk melihat jadwal mengajar, menampilkan QR identitas dosen, dan memantau riwayat penggunaan ruang. Bagi admin, aplikasi menyediakan dashboard monitoring, daftar peminjaman, data ruang, mapping jadwal, dan aktivitas terbaru.
                </p>
            </div>
            <div id="teknologi" class="grid gap-4 md:grid-cols-2">
                @foreach (['React Native / Expo', 'Integrasi API ITATS', 'QR Code Scanner', 'Dashboard Mobile', 'Local Cache untuk Performa', 'Laravel Static Website'] as $tech)
                    <div class="shadcn-card rounded-lg p-5" data-reveal>
                        <p class="font-black text-slate-950">{{ $tech }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="demo" class="mx-auto max-w-7xl px-5 py-20 lg:px-8">
        <div class="shadcn-surface overflow-hidden rounded-lg p-8 md:p-10" data-reveal>
            <div class="grid items-center gap-8 md:grid-cols-[1fr_auto]">
                <div>
                    <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Demo aplikasi</p>
                    <h2 class="mt-2 text-3xl font-black text-slate-950">Tampilkan alur QR dari scan ruang sampai monitoring dashboard</h2>
                    <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-600">
                        Gunakan halaman fitur, cara kerja, dan dashboard untuk menjelaskan proses peminjaman kunci ruang secara runtut kepada asesor.
                    </p>
                </div>
                <a href="{{ route('workflow') }}" class="shadcn-button bg-slate-950 px-6 py-3 text-center text-sm text-white shadow-xl shadow-slate-950/15 hover:bg-emerald-700">Lihat Cara Kerja</a>
            </div>
        </div>
    </section>
@endsection
