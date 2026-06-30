@extends('layouts.app')

@section('title', 'Cara Kerja - Pinjam Ruang ITATS')

@section('content')
    <section class="relative overflow-hidden px-5 py-20 lg:px-8">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(16,185,129,.14),transparent_36rem)]"></div>
        <div class="relative mx-auto max-w-7xl">
            <div data-reveal>
                <p class="text-sm font-black uppercase tracking-normal text-emerald-700">Cara kerja</p>
                <h1 class="mt-3 max-w-4xl text-4xl font-black text-slate-950 md:text-5xl">Alur QR dari ambil kunci sampai pengembalian ruang</h1>
            </div>

            <div class="mt-12 grid gap-10 lg:grid-cols-[1fr_430px] lg:items-start">
                <div class="relative">
                    <div class="absolute left-5 top-5 h-[calc(100%-2.5rem)] w-px bg-gradient-to-b from-emerald-500 via-slate-300 to-emerald-500 md:left-10"></div>

                    @foreach ([
                        ['step' => '01', 'title' => 'Admin scan QR ruang', 'body' => 'Admin memilih ruang dengan memindai QR yang terpasang atau terdaftar pada data ruang.'],
                        ['step' => '02', 'title' => 'Admin scan QR dosen', 'body' => 'QR identitas dosen dipindai untuk memastikan peminjam tercatat dengan benar.'],
                        ['step' => '03', 'title' => 'Sistem validasi jadwal', 'body' => 'Aplikasi mencocokkan dosen, ruang, dan waktu dengan jadwal perkuliahan yang berlaku.'],
                        ['step' => '04', 'title' => 'Data peminjaman tersimpan', 'body' => 'Transaksi peminjaman kunci disimpan ke API sebagai catatan digital.'],
                        ['step' => '05', 'title' => 'Status ruang dapat dipantau', 'body' => 'Dashboard admin menampilkan status ruang dan aktivitas terbaru secara real-time.'],
                        ['step' => '06', 'title' => 'Dosen mengembalikan kunci melalui scan QR', 'body' => 'Pengembalian kunci dicatat kembali dengan QR sehingga riwayat penggunaan ruang tetap lengkap.'],
                    ] as $flow)
                        <article class="relative grid grid-cols-[42px_1fr] gap-5 pb-6 last:pb-0 md:grid-cols-[84px_1fr]" data-reveal>
                            <div class="relative z-10 flex justify-center pt-3">
                                <div class="grid h-10 w-10 place-items-center rounded-full border border-emerald-500/30 bg-white text-sm font-black text-emerald-700 shadow-sm ring-8 ring-white md:h-12 md:w-12">
                                    {{ $flow['step'] }}
                                </div>
                            </div>

                            <div class="shadcn-card relative rounded-lg p-6">
                                <div class="absolute left-0 top-8 hidden h-px w-6 -translate-x-6 bg-slate-300 md:block"></div>
                                <h2 class="text-xl font-black text-slate-950">{{ $flow['title'] }}</h2>
                                <p class="mt-2 text-sm leading-7 text-slate-600">{{ $flow['body'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <aside class="mockup-enter lg:sticky lg:top-28" data-reveal>
                    <div class="relative mx-auto max-w-xs lg:max-w-sm">
                        <div class="absolute inset-x-8 bottom-5 h-16 rounded-full bg-slate-950/15 blur-2xl"></div>
                        <img
                            src="{{ asset('images/mockup1side.png') }}"
                            alt="Mockup dashboard aplikasi Pinjam Ruang ITATS"
                            class="relative mx-auto w-full object-contain"
                            loading="eager"
                        >
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
