<form class="grid gap-6 xl:grid-cols-[1fr_360px]" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Customer voice</p>
            <h2 class="text-xl font-black">Testimonial details</h2>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <label class="text-sm font-bold text-slate-700" for="name">Name</label>
                <input id="name" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-400 @enderror" name="name" value="{{ old('name', $testimonial->name) }}" required maxlength="120">
                @error('name')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="rating">Rating</label>
                <select id="rating" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('rating') border-red-400 @enderror" name="rating" required>
                    @for($rating = 5; $rating >= 1; $rating--)
                        <option value="{{ $rating }}" @selected((int) old('rating', $testimonial->rating ?? 5) === $rating)>{{ $rating }} star{{ $rating > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
                @error('rating')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="role">Role</label>
                <input id="role" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('role') border-red-400 @enderror" name="role" value="{{ old('role', $testimonial->role) }}" maxlength="120" placeholder="Operations Director">
                @error('role')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="company">Company</label>
                <input id="company" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('company') border-red-400 @enderror" name="company" value="{{ old('company', $testimonial->company) }}" maxlength="160">
                @error('company')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="text-sm font-bold text-slate-700" for="sort_order">Display order</label>
                <input id="sort_order" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('sort_order') border-red-400 @enderror" type="number" min="0" max="9999" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}">
                @error('sort_order')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-end">
                <label class="flex w-full items-center justify-between rounded-2xl bg-slate-50 p-4">
                    <span>
                        <span class="block font-bold text-slate-800">Active</span>
                        <span class="text-sm text-slate-500">Show on frontend</span>
                    </span>
                    <input type="hidden" name="is_active" value="0">
                    <input class="h-5 w-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500" type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->exists ? $testimonial->is_active : true))>
                </label>
            </div>
            <div class="md:col-span-2">
                <label class="text-sm font-bold text-slate-700" for="quote">Quote</label>
                <textarea id="quote" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('quote') border-red-400 @enderror" rows="8" name="quote" required maxlength="1500" placeholder="Customer testimonial">{{ old('quote', $testimonial->quote) }}</textarea>
                @error('quote')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
    </section>

    <aside class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm" x-data="{ preview: '{{ $testimonial->image ? asset('frontend/assets/img/'.$testimonial->image) : '' }}' }">
            <h2 class="text-xl font-black">Customer photo</h2>
            <p class="mt-1 text-sm text-slate-500">Best frontend size: square 600 x 600px, JPG/PNG/WebP, under 2MB.</p>
            <div class="mt-4 overflow-hidden rounded-3xl border border-dashed border-slate-300 bg-slate-50">
                <template x-if="preview">
                    <img :src="preview" alt="Preview" class="h-64 w-full object-cover">
                </template>
                <div x-show="!preview" class="grid h-64 place-items-center text-center text-sm font-bold text-slate-400">Photo preview</div>
            </div>
            <input type="hidden" name="image" value="{{ old('image', $testimonial->image) }}">
            <input class="mt-4 block w-full rounded-2xl border border-slate-200 bg-white p-2 text-sm file:mr-4 file:rounded-xl file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-bold file:text-blue-700" type="file" name="image_file" accept="image/png,image/jpeg,image/webp" @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : preview">
            @error('image_file')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            @if($testimonial->image)
                <label class="mt-4 flex items-center gap-2 text-sm font-bold text-red-600">
                    <input type="checkbox" name="remove_image" value="1" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                    Remove current photo
                </label>
            @endif
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <button class="w-full rounded-2xl bg-blue-600 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-700">Save Testimonial</button>
            <a href="{{ route('backend.testimonials.index') }}" class="mt-3 block rounded-2xl border border-slate-200 px-5 py-3 text-center text-sm font-bold text-slate-700 transition hover:bg-slate-50">Cancel</a>
        </section>
    </aside>
</form>
