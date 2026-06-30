@php
    $navItems = [
        ['label' => 'Beranda', 'href' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'Fitur', 'href' => route('features'), 'active' => request()->routeIs('features')],
        ['label' => 'Cara Kerja', 'href' => route('workflow'), 'active' => request()->routeIs('workflow')],
        ['label' => 'Dashboard', 'href' => route('showcase'), 'active' => request()->routeIs('showcase')],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-slate-950/10 bg-white/95">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3 lg:px-8" aria-label="Navigasi utama">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <span class="grid h-11 w-11 place-items-center overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-slate-950/10">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo Pinjam Ruang ITATS" class="h-full w-full object-contain p-1">
            </span>
            <span>
                <span class="block text-base font-black leading-tight text-slate-950">Pinjam Ruang</span>
                <span class="block text-xs font-semibold uppercase tracking-normal text-emerald-700">QR Room Monitoring</span>
            </span>
        </a>

        <div class="hidden items-center gap-6 lg:flex">
            @foreach ($navItems as $item)
                <a
                    href="{{ $item['href'] }}"
                    @class([
                        'relative py-2 text-sm font-bold transition-colors duration-200 after:absolute after:inset-x-0 after:-bottom-0.5 after:h-0.5 after:rounded-full after:transition-transform after:duration-200',
                        'text-slate-950 after:scale-x-100 after:bg-emerald-600' => $item['active'],
                        'text-slate-500 after:scale-x-0 after:bg-slate-950 hover:text-slate-950 hover:after:scale-x-100' => ! $item['active'],
                    ])
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        <a href="{{ route('home') }}#demo" class="shadcn-button hidden bg-slate-950 px-4 py-2.5 text-sm text-white shadow-sm hover:bg-emerald-700 lg:inline-flex">
            Lihat Demo
        </a>

        <details class="relative lg:hidden">
            <summary class="grid h-11 w-11 cursor-pointer list-none place-items-center rounded-lg border border-slate-950/10 bg-white text-slate-950 shadow-sm">
                <span class="sr-only">Buka menu</span>
                <span class="h-0.5 w-5 bg-current shadow-[0_6px_0_currentColor,0_-6px_0_currentColor]"></span>
            </summary>
            <div class="absolute right-0 mt-3 w-56 rounded-lg border border-slate-950/10 bg-white p-2 shadow-xl">
                @foreach ($navItems as $item)
                    <a href="{{ $item['href'] }}" class="block rounded-md px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50 hover:text-slate-950">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('home') }}#demo" class="mt-2 block rounded-md bg-slate-950 px-4 py-3 text-center text-sm font-black text-white">
                    Lihat Demo
                </a>
            </div>
        </details>
    </nav>
</header>
