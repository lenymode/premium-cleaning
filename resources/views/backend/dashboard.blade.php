@extends('backend.layouts.app', ['title' => 'Dashboard'])

@section('content')
<div class="grid gap-6 xl:grid-cols-[1fr_380px]">
    <div class="space-y-6">
        <section class="overflow-hidden rounded-3xl bg-slate-950 p-6 text-white shadow-xl shadow-slate-950/10">
            <div class="grid gap-6 lg:grid-cols-[1fr_280px] lg:items-center">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[.22em] text-blue-300">Admin overview</p>
                    <h2 class="mt-2 text-3xl font-black sm:text-4xl">Good morning, {{ auth()->user()->name }}.</h2>
                    <p class="mt-3 max-w-2xl text-slate-300">Manage services, testimonials, coverage areas and quote requests from one focused workspace.</p>
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('backend.services.create') }}" class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-950/40 transition hover:bg-blue-500">Add Service</a>
                        <a href="{{ route('backend.quote-requests.index', ['status' => 'new']) }}" class="rounded-2xl border border-white/15 px-5 py-3 text-sm font-black text-white transition hover:bg-white/10">Review Leads</a>
                    </div>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-sm font-bold text-slate-300">Pending leads</p>
                    <p class="mt-2 text-5xl font-black">{{ $newLeadCount }}</p>
                    <p class="mt-2 text-sm text-slate-400">New quote requests waiting for review.</p>
                </div>
            </div>
        </section>

        <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            @foreach([
                ['label' => 'Services', 'count' => $serviceCount, 'route' => route('backend.services.index'), 'tone' => 'bg-blue-600'],
                ['label' => 'Testimonials', 'count' => $testimonialCount, 'route' => route('backend.testimonials.index'), 'tone' => 'bg-emerald-600'],
                ['label' => 'Locations', 'count' => $locationCount, 'route' => route('backend.locations.index'), 'tone' => 'bg-cyan-600'],
                ['label' => 'New Leads', 'count' => $newLeadCount, 'route' => route('backend.quote-requests.index', ['status' => 'new']), 'tone' => 'bg-amber-500'],
            ] as $card)
                <a href="{{ $card['route'] }}" class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-xl hover:shadow-slate-950/5">
                    <div class="flex items-center justify-between gap-3">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl {{ $card['tone'] }} text-lg font-black text-white">{{ substr($card['label'], 0, 1) }}</div>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-500">Open</span>
                    </div>
                    <p class="mt-5 text-sm font-bold text-slate-500">{{ $card['label'] }}</p>
                    <p class="mt-1 text-4xl font-black text-slate-950">{{ $card['count'] }}</p>
                </a>
            @endforeach
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-5 flex items-center justify-between gap-3">
                <div>
                    <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Lead inbox</p>
                    <h2 class="text-xl font-black">Recent quote requests</h2>
                </div>
                <a href="{{ route('backend.quote-requests.index') }}" class="rounded-2xl border border-slate-200 px-4 py-2 text-sm font-bold text-slate-700 transition hover:bg-slate-50">View All</a>
            </div>
            <div class="space-y-3">
                @forelse($recentQuoteRequests as $lead)
                    <a href="{{ route('backend.quote-requests.show', $lead) }}" class="flex flex-col gap-2 rounded-2xl border border-slate-100 bg-slate-50 p-4 transition hover:border-blue-200 hover:bg-blue-50 sm:flex-row sm:items-center sm:justify-between">
                        <span>
                            <span class="block font-bold text-slate-950">{{ $lead->name }}</span>
                            <span class="block text-sm text-slate-500">{{ $lead->service }} · {{ $lead->email }}</span>
                        </span>
                        <span class="text-sm font-bold text-blue-700">{{ $lead->created_at?->diffForHumans() }}</span>
                    </a>
                @empty
                    <div class="rounded-2xl bg-slate-50 p-6 text-center text-slate-500">No quote requests yet.</div>
                @endforelse
            </div>
        </section>
    </div>

    <aside class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Content health</p>
            <h2 class="mt-1 text-xl font-black">Frontend readiness</h2>
            <div class="mt-5 space-y-4">
                @foreach([
                    ['label' => 'Services available', 'value' => $serviceCount, 'target' => 6],
                    ['label' => 'Testimonials live', 'value' => $testimonialCount, 'target' => 3],
                    ['label' => 'Coverage areas', 'value' => $locationCount, 'target' => 4],
                ] as $item)
                    @php($percent = min(100, $item['target'] > 0 ? round(($item['value'] / $item['target']) * 100) : 0))
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm">
                            <span class="font-bold text-slate-700">{{ $item['label'] }}</span>
                            <span class="font-black text-slate-950">{{ $item['value'] }}/{{ $item['target'] }}</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-blue-600" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Quick actions</p>
            <h2 class="mt-1 text-xl font-black">Create or update</h2>
            <div class="mt-4 grid gap-3">
                <a href="{{ route('backend.services.create') }}" class="rounded-2xl bg-slate-50 p-4 font-bold text-slate-800 transition hover:bg-blue-50 hover:text-blue-700">Create service</a>
                <a href="{{ route('backend.testimonials.create') }}" class="rounded-2xl bg-slate-50 p-4 font-bold text-slate-800 transition hover:bg-blue-50 hover:text-blue-700">Add testimonial</a>
                <a href="{{ route('backend.locations.create') }}" class="rounded-2xl bg-slate-50 p-4 font-bold text-slate-800 transition hover:bg-blue-50 hover:text-blue-700">Add location</a>
                <a href="{{ route('backend.settings.edit') }}" class="rounded-2xl bg-slate-50 p-4 font-bold text-slate-800 transition hover:bg-blue-50 hover:text-blue-700">Profile settings</a>
            </div>
        </section>
    </aside>
</div>
@endsection
