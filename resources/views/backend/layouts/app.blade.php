<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} | {{ config('site.name') }}</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-950 antialiased" data-admin-validation>
@php
    $user = auth()->user();
    $navItems = [
        ['label' => 'Dashboard', 'route' => 'backend.dashboard', 'match' => 'backend.dashboard', 'icon' => 'M3 13h8V3H3v10Zm0 8h8v-6H3v6Zm10 0h8V11h-8v10Zm0-18v6h8V3h-8Z'],
        ['label' => 'Services', 'route' => 'backend.services.index', 'match' => 'backend.services.*', 'icon' => 'M4 5h16v4H4V5Zm0 6h16v8H4v-8Zm2 2v4h12v-4H6Z'],
        ['label' => 'Testimonials', 'route' => 'backend.testimonials.index', 'match' => 'backend.testimonials.*', 'icon' => 'M4 5h16v10H7l-3 3V5Zm4 4h8V7H8v2Zm0 4h5v-2H8v2Z'],
        ['label' => 'Locations', 'route' => 'backend.locations.index', 'match' => 'backend.locations.*', 'icon' => 'M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5Z'],
        ['label' => 'Quote Requests', 'route' => 'backend.quote-requests.index', 'match' => 'backend.quote-requests.*', 'icon' => 'M3 5h18v14H3V5Zm2 3v9h14V8l-7 4.5L5 8Zm1.8-1 5.2 3.3L17.2 7H6.8Z'],
    ];
@endphp
<div
    x-data="{
        collapsed: localStorage.getItem('cw-admin-collapsed') === '1',
        mobileOpen: false,
        profileOpen: false,
        toastOpen: true,
        toggleSidebar() {
            this.collapsed = !this.collapsed;
            localStorage.setItem('cw-admin-collapsed', this.collapsed ? '1' : '0');
        }
    }"
    x-init="setTimeout(() => toastOpen = false, 4800)"
    class="min-h-screen"
>
    <div x-show="mobileOpen" x-cloak class="fixed inset-0 z-40 bg-slate-950/50 lg:hidden" @click="mobileOpen = false"></div>

    <aside
        class="admin-sidebar fixed inset-y-0 left-0 z-50 flex flex-col border-r border-slate-800 bg-slate-950 text-white transition-all duration-300"
        :class="[mobileOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0', collapsed && !mobileOpen ? 'is-collapsed' : '']"
    >
        <button type="button" class="absolute -right-4 top-7 z-10 hidden h-9 w-9 place-items-center rounded-full border border-slate-800 bg-white text-slate-700 shadow-lg transition hover:text-blue-700 lg:grid" @click="toggleSidebar()" aria-label="Toggle sidebar">
            <svg class="h-4 w-4 transition-transform" :class="collapsed ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M12.7 15.7a1 1 0 0 1-1.4 0l-5-5a1 1 0 0 1 0-1.4l5-5a1 1 0 1 1 1.4 1.4L8.42 10l4.3 4.3a1 1 0 0 1-.02 1.4Z"/>
            </svg>
        </button>

        <div class="flex h-24 items-center justify-center border-b border-white/10" :class="collapsed && !mobileOpen ? 'px-3' : 'px-5'">
            <a href="{{ route('backend.dashboard') }}" class="flex min-w-0 items-center">
                <img
                    src="{{ asset('frontend/logo-white.png') }}"
                    alt="{{ config('site.name') }}"
                    class="h-auto max-h-16 w-auto object-contain transition-all duration-300"
                    :class="collapsed && !mobileOpen ? 'max-h-12 max-w-12' : 'max-w-[210px]'"
                >
            </a>
        </div>

        <nav class="flex-1 space-y-1 overflow-y-auto px-3 py-5">
            @foreach($navItems as $item)
                @php($active = request()->routeIs($item['match']))
                <a href="{{ route($item['route']) }}" class="group flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-semibold transition {{ $active ? 'bg-blue-600 text-white shadow-lg shadow-blue-950/40' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}" :class="collapsed && !mobileOpen ? 'justify-center' : ''">
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="{{ $item['icon'] }}"/></svg>
                    <span x-show="!collapsed || mobileOpen" x-transition>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="border-t border-white/10 p-3">
            <a href="{{ route('frontend.home') }}" target="_blank" class="flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white" :class="collapsed && !mobileOpen ? 'justify-center' : ''">
                <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Zm6.7 8h-3.1a14.7 14.7 0 0 0-1.1-5A7.03 7.03 0 0 1 18.7 11ZM12 5.1c.6.9 1.3 2.9 1.5 5.9h-3c.2-3 .9-5 1.5-5.9ZM5.3 13h3.1c.1 1.8.4 3.5 1.1 5A7.03 7.03 0 0 1 5.3 13Zm3.1-2H5.3A7.03 7.03 0 0 1 9.5 6a14.7 14.7 0 0 0-1.1 5Zm3.6 7.9c-.6-.9-1.3-2.9-1.5-5.9h3c-.2 3-.9 5-1.5 5.9Zm2.5-.9c.7-1.5 1-3.2 1.1-5h3.1a7.03 7.03 0 0 1-4.2 5Z"/></svg>
                <span x-show="!collapsed || mobileOpen" x-transition>View Website</span>
            </a>
        </div>
    </aside>

    <div class="min-h-screen transition-all duration-300" :class="collapsed ? 'lg:pl-24' : 'lg:pl-72'">
        <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur">
            <div class="flex h-20 items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
                <div class="flex min-w-0 items-center gap-3">
                    <button type="button" class="grid h-11 w-11 place-items-center rounded-2xl border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-blue-200 hover:text-blue-700 lg:hidden" @click="mobileOpen = true" aria-label="Open menu">
                        <span class="text-xl leading-none">≡</span>
                    </button>
                    <div class="min-w-0">
                        <p class="text-xs font-bold uppercase tracking-[.22em] text-blue-600">Crestwell Admin</p>
                        <h1 class="truncate text-xl font-black text-slate-950 sm:text-2xl">{{ $title ?? 'Dashboard' }}</h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('frontend.home') }}" target="_blank" class="hidden rounded-2xl bg-slate-950 px-4 py-3 text-sm font-black text-white transition hover:bg-blue-700 md:inline-flex">View Website</a>

                    <div class="relative" @keydown.escape.window="profileOpen = false">
                        <button type="button" class="flex items-center gap-3 rounded-2xl bg-transparent px-2 py-2 transition hover:bg-slate-100" @click="profileOpen = !profileOpen">
                            <span class="grid h-10 w-10 place-items-center overflow-hidden rounded-xl bg-blue-600 text-sm font-black text-white">
                                @if($user?->avatarUrl())
                                    <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}" class="h-full w-full object-cover">
                                @else
                                    {{ $user?->initials() ?: 'A' }}
                                @endif
                            </span>
                            <span class="hidden text-left sm:block">
                                <span class="block text-sm font-bold leading-tight">{{ $user?->name }}</span>
                                <span class="block max-w-44 truncate text-xs text-slate-500">{{ $user?->email }}</span>
                            </span>
                            <svg class="hidden h-4 w-4 text-slate-400 sm:block" viewBox="0 0 20 20" fill="currentColor"><path d="M5.3 7.3a1 1 0 0 1 1.4 0L10 10.6l3.3-3.3a1 1 0 1 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 0-1.4Z"/></svg>
                        </button>
                        <div x-show="profileOpen" x-cloak x-transition @click.outside="profileOpen = false" class="absolute right-0 mt-3 w-72 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-slate-950/10">
                            <div class="border-b border-slate-100 p-4">
                                <p class="font-bold">{{ $user?->name }}</p>
                                <p class="truncate text-sm text-slate-500">{{ $user?->email }}</p>
                            </div>
                            <a href="{{ route('backend.settings.edit') }}" class="block px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50">Profile & Settings</a>
                            <form method="POST" action="{{ route('logout') }}" class="border-t border-slate-100">
                                @csrf
                                <button class="block w-full px-4 py-3 text-left text-sm font-semibold text-red-600 hover:bg-red-50">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="px-4 py-6 sm:px-6 lg:px-8">
            @if($errors->any())
                <div class="mb-6 rounded-3xl border border-red-200 bg-red-50 p-4 text-red-800 shadow-sm">
                    <p class="font-bold">Please fix the highlighted fields.</p>
                    <ul class="mt-2 list-inside list-disc text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <div class="fixed bottom-5 right-5 z-50 space-y-3">
        @if(session('status'))
            <div x-show="toastOpen" x-transition class="max-w-sm rounded-3xl border border-emerald-200 bg-white p-4 shadow-2xl shadow-slate-950/15">
                <div class="flex gap-3">
                    <div class="grid h-10 w-10 shrink-0 place-items-center rounded-2xl bg-emerald-100 font-black text-emerald-700">✓</div>
                    <div>
                        <p class="font-bold text-slate-950">Success</p>
                        <p class="text-sm text-slate-600">{{ session('status') }}</p>
                    </div>
                    <button class="ml-3 text-slate-400 hover:text-slate-700" @click="toastOpen = false">×</button>
                </div>
            </div>
        @endif
        @if($errors->any())
            <div x-show="toastOpen" x-transition class="max-w-sm rounded-3xl border border-red-200 bg-white p-4 shadow-2xl shadow-slate-950/15">
                <div class="flex gap-3">
                    <div class="grid h-10 w-10 shrink-0 place-items-center rounded-2xl bg-red-100 font-black text-red-700">!</div>
                    <div>
                        <p class="font-bold text-slate-950">Validation error</p>
                        <p class="text-sm text-slate-600">Some fields need your attention.</p>
                    </div>
                    <button class="ml-3 text-slate-400 hover:text-slate-700" @click="toastOpen = false">×</button>
                </div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
