<form class="grid gap-6 xl:grid-cols-[1fr_320px]" method="POST" action="{{ $action }}">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Coverage area</p>
            <h2 class="text-xl font-black">Location details</h2>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="text-sm font-bold text-slate-700" for="name">Name</label>
                <input id="name" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-400 @enderror" name="name" value="{{ old('name', $location->name) }}" required maxlength="140" placeholder="Central Business Districts">
                @error('name')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="slug">Slug</label>
                <input id="slug" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('slug') border-red-400 @enderror" name="slug" value="{{ old('slug', $location->slug) }}" maxlength="160" placeholder="auto-generated if blank">
                @error('slug')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="county">County</label>
                <input id="county" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('county') border-red-400 @enderror" name="county" value="{{ old('county', $location->county) }}" maxlength="120" placeholder="Greater London">
                @error('county')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="postcode_area">Postcode area</label>
                <input id="postcode_area" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('postcode_area') border-red-400 @enderror" name="postcode_area" value="{{ old('postcode_area', $location->postcode_area) }}" maxlength="30" placeholder="EC, WC, SE">
                @error('postcode_area')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="sort_order">Display order</label>
                <input id="sort_order" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('sort_order') border-red-400 @enderror" type="number" min="0" max="9999" name="sort_order" value="{{ old('sort_order', $location->sort_order ?? 0) }}">
                @error('sort_order')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-end">
                <label class="flex w-full items-center justify-between rounded-2xl bg-slate-50 p-4">
                    <span>
                        <span class="block font-bold text-slate-800">Active</span>
                        <span class="text-sm text-slate-500">Show on frontend</span>
                    </span>
                    <input type="hidden" name="is_active" value="0">
                    <input class="h-5 w-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500" type="checkbox" name="is_active" value="1" @checked(old('is_active', $location->exists ? $location->is_active : true))>
                </label>
            </div>
            <div class="md:col-span-2">
                <label class="text-sm font-bold text-slate-700" for="description">Description</label>
                <textarea id="description" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-400 @enderror" rows="7" name="description" maxlength="1000" placeholder="Explain what you cover in this area">{{ old('description', $location->description) }}</textarea>
                @error('description')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
    </section>

    <aside class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-xl font-black">Frontend guidance</h2>
            <p class="mt-2 text-sm text-slate-600">Locations appear in service-area sections and contact pages. Use clear public-facing names and keep descriptions concise.</p>
            <div class="mt-5 rounded-2xl bg-blue-50 p-4 text-sm text-blue-800">
                Good description length: 1-2 sentences, roughly 160-260 characters.
            </div>
        </section>
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <button class="w-full rounded-2xl bg-blue-600 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-700">Save Location</button>
            <a href="{{ route('backend.locations.index') }}" class="mt-3 block rounded-2xl border border-slate-200 px-5 py-3 text-center text-sm font-bold text-slate-700 transition hover:bg-slate-50">Cancel</a>
        </section>
    </aside>
</form>
