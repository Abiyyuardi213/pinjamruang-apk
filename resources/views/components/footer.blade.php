<footer id="kontak" class="bg-slate-950 text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 py-12 lg:grid-cols-[1.4fr_1fr_1fr] lg:px-8">
        <div>
            <div class="flex items-center gap-3">
                <span class="grid h-11 w-11 place-items-center overflow-hidden rounded-lg bg-white shadow-sm">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo Pinjam Ruang ITATS" class="h-full w-full object-contain p-1">
                </span>
                <div>
                    <p class="font-black">Pinjam Ruang ITATS</p>
                    <p class="text-sm text-emerald-100">Digitalisasi peminjaman ruang berbasis QR</p>
                </div>
            </div>
            <p class="mt-5 max-w-md text-sm leading-7 text-slate-300">
                Website statis berbasis Laravel untuk memperkenalkan aplikasi peminjaman dan monitoring ruang perkuliahan yang membantu admin dan dosen memproses kunci ruang secara cepat, tertib, dan terpantau.
            </p>
        </div>

        <div>
            <h2 class="text-sm font-black uppercase tracking-normal text-emerald-300">Navigasi</h2>
            <div class="mt-4 grid gap-3 text-sm text-slate-300">
                <a href="{{ route('features') }}" class="hover:text-white">Fitur Aplikasi</a>
                <a href="{{ route('workflow') }}" class="hover:text-white">Cara Kerja QR</a>
                <a href="{{ route('showcase') }}" class="hover:text-white">Dashboard Aplikasi</a>
                <a href="{{ route('home') }}#teknologi" class="hover:text-white">Teknologi</a>
            </div>
        </div>

        <div>
            <h2 class="text-sm font-black uppercase tracking-normal text-emerald-300">Kontak Project</h2>
            <div class="mt-4 grid gap-3 text-sm text-slate-300">
                <p>Institut Teknologi Adhi Tama Surabaya</p>
                <p>Platform: React Native / Expo</p>
                <p>Integrasi: API ITATS dan QR Code Scanner</p>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10 px-5 py-5 text-center text-xs font-semibold text-slate-300">
        © {{ date('Y') }} Pinjam Ruang ITATS. Dibuat untuk presentasi dan penilaian project.
    </div>
</footer>
