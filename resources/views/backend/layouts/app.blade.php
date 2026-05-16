<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Crestwell Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen md:flex">
        <aside class="bg-slate-950 text-white md:w-72 p-6">
            <a href="{{ route('backend.dashboard') }}" class="block text-xl font-bold">{{ config('site.name') }}</a>
            <p class="text-sm text-slate-300 mt-1">Admin Console</p>
            <nav class="mt-8 space-y-2">
                <a class="block rounded px-3 py-2 hover:bg-slate-800" href="{{ route('backend.dashboard') }}">Dashboard</a>
                <a class="block rounded px-3 py-2 hover:bg-slate-800" href="{{ route('backend.services.index') }}">Services</a>
                <a class="block rounded px-3 py-2 hover:bg-slate-800" href="{{ route('backend.testimonials.index') }}">Testimonials</a>
                <a class="block rounded px-3 py-2 hover:bg-slate-800" href="{{ route('backend.locations.index') }}">Locations</a>
                <a class="block rounded px-3 py-2 hover:bg-slate-800" href="{{ route('backend.quote-requests.index') }}">Quote Requests</a>
                <a class="block rounded px-3 py-2 hover:bg-slate-800" href="{{ route('frontend.home') }}">View Website</a>
            </nav>
        </aside>
        <div class="flex-1">
            <header class="bg-white border-b px-6 py-4 flex items-center justify-between">
                <h1 class="font-semibold">{{ $title ?? 'Dashboard' }}</h1>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-slate-600 hover:text-slate-950">Logout</button>
                </form>
            </header>
            <main class="p-6">
                @if(session('status'))
                    <div class="mb-4 rounded bg-emerald-50 border border-emerald-200 px-4 py-3 text-emerald-800">{{ session('status') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
