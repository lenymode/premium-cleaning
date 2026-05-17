@php
    $pageSizeOptions = [10, 25, 50, 100];
    $currentPageSize = $items->perPage();
@endphp

<div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
    <div class="flex flex-col gap-3 border-b border-slate-100 bg-white px-4 py-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-bold text-slate-900">
                Showing {{ $items->firstItem() ?? 0 }}-{{ $items->lastItem() ?? 0 }} of {{ $items->total() }}
            </p>
            <p class="text-xs font-semibold text-slate-500">Use the page size control to choose how many rows appear.</p>
        </div>
        <form method="GET" class="flex items-center gap-2">
            @foreach(request()->except(['per_page', 'page']) as $key => $value)
                @if(is_array($value))
                    @foreach($value as $nestedValue)
                        <input type="hidden" name="{{ $key }}[]" value="{{ $nestedValue }}">
                    @endforeach
                @else
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach
            <label class="text-xs font-black uppercase tracking-wide text-slate-500" for="per-page-{{ $routePrefix }}">Rows</label>
            <select id="per-page-{{ $routePrefix }}" name="per_page" class="rounded-2xl border-slate-200 bg-slate-50 px-3 py-2 text-sm font-bold text-slate-700 focus:border-blue-500 focus:ring-blue-500" onchange="this.form.submit()">
                @foreach($pageSizeOptions as $option)
                    <option value="{{ $option }}" @selected($currentPageSize === $option)>{{ $option }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full min-w-[760px] text-left text-sm">
            <thead class="bg-slate-50 text-xs font-black uppercase tracking-wide text-slate-500">
                <tr>
                    @foreach($columns as $column)
                        <th class="px-5 py-4">{{ str($column)->headline() }}</th>
                    @endforeach
                    <th class="px-5 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($items as $item)
                    <tr class="transition hover:bg-slate-50/70">
                        @foreach($columns as $column)
                            <td class="px-5 py-4 align-middle">
                                @if($column === 'image')
                                    @if($item->image)
                                        <img src="{{ asset('frontend/assets/img/'.$item->image) }}" alt="" class="h-14 w-20 rounded-2xl object-cover ring-1 ring-slate-200">
                                    @else
                                        <span class="inline-flex h-14 w-20 items-center justify-center rounded-2xl bg-slate-100 text-xs font-bold text-slate-400">No image</span>
                                    @endif
                                @elseif($column === 'icon_class')
                                    <span class="inline-flex items-center gap-3">
                                        <span class="grid h-11 w-11 place-items-center rounded-2xl bg-blue-600 text-white">
                                            <i class="{{ $item->icon_class ?: 'fa-solid fa-broom' }}"></i>
                                        </span>
                                        <span class="text-xs font-semibold text-slate-500">{{ $item->icon_class ?: 'fa-solid fa-broom' }}</span>
                                    </span>
                                @elseif($column === 'is_active')
                                    <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold {{ $item->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                        {{ $item->is_active ? 'Active' : 'Draft' }}
                                    </span>
                                @elseif($column === 'status')
                                    <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold {{ $item->status === 'new' ? 'bg-blue-100 text-blue-700' : 'bg-slate-100 text-slate-600' }}">
                                        {{ str($item->status)->headline() }}
                                    </span>
                                @elseif($column === 'title' || $column === 'name')
                                    <div>
                                        <p class="font-bold text-slate-950">{{ $item->{$column} }}</p>
                                        @if(isset($item->slug) && $item->slug)
                                            <p class="text-xs text-slate-500">{{ $item->slug }}</p>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-slate-700">{{ is_bool($item->{$column}) ? ($item->{$column} ? 'Yes' : 'No') : str($item->{$column} ?? 'N/A')->limit(70) }}</span>
                                @endif
                            </td>
                        @endforeach
                        <td class="px-5 py-4 text-right align-middle">
                            <div class="inline-flex overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                                <a class="px-3 py-2 text-xs font-bold text-slate-700 transition hover:bg-slate-50" href="{{ route($routePrefix.'.show', $item) }}">View</a>
                                @if(\Illuminate\Support\Facades\Route::has($routePrefix.'.edit'))
                                    <a class="border-l border-slate-200 px-3 py-2 text-xs font-bold text-blue-700 transition hover:bg-blue-50" href="{{ route($routePrefix.'.edit', $item) }}">Edit</a>
                                @endif
                                <form method="POST" action="{{ route($routePrefix.'.destroy', $item) }}" onsubmit="return confirm('Delete this item? This action cannot be undone.')" class="border-l border-slate-200">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-2 text-xs font-bold text-red-600 transition hover:bg-red-50">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-5 py-12 text-center text-slate-500" colspan="{{ count($columns) + 1 }}">
                            <p class="font-bold text-slate-700">No records found</p>
                            <p class="mt-1 text-sm">Create the first item or adjust your filters.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($items->hasPages())
        <div class="border-t border-slate-100 bg-slate-50/60 px-4 py-4">{{ $items->links() }}</div>
    @endif
</div>
