@php
    $benefits = old('benefits', $service->benefits ?: ['', '', '', '']);
    $faqs = old('faqs', $service->faqs ?: [
        ['question' => '', 'answer' => ''],
        ['question' => '', 'answer' => ''],
        ['question' => '', 'answer' => ''],
    ]);
@endphp

<form class="grid gap-6 xl:grid-cols-[1fr_380px]" method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($method !== 'POST') @method($method) @endif

    <div class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-6">
                <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Service content</p>
                <h2 class="text-xl font-black">Core details</h2>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label class="text-sm font-bold text-slate-700" for="title">Title</label>
                    <input id="title" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('title') border-red-400 @enderror" name="title" value="{{ old('title', $service->title) }}" required maxlength="160" placeholder="Office Cleaning">
                    @error('title')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="text-sm font-bold text-slate-700" for="slug">Slug</label>
                    <input id="slug" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('slug') border-red-400 @enderror" name="slug" value="{{ old('slug', $service->slug) }}" maxlength="180" placeholder="auto-generated if blank">
                    @error('slug')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="text-sm font-bold text-slate-700" for="sort_order">Display order</label>
                    <input id="sort_order" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('sort_order') border-red-400 @enderror" type="number" min="0" max="9999" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}">
                    @error('sort_order')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="text-sm font-bold text-slate-700" for="excerpt">Excerpt</label>
                    <textarea id="excerpt" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('excerpt') border-red-400 @enderror" rows="3" name="excerpt" required maxlength="500" placeholder="Short text used on service cards">{{ old('excerpt', $service->excerpt) }}</textarea>
                    <p class="mt-2 text-xs font-medium text-slate-500">Keep this under 2-3 lines for the frontend service carousel.</p>
                    @error('excerpt')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="md:col-span-2">
                    <label class="text-sm font-bold text-slate-700" for="description">Description</label>
                    <textarea id="description" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-400 @enderror" rows="8" name="description" required placeholder="Full service page content">{{ old('description', $service->description) }}</textarea>
                    @error('description')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-6">
                <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Structured content</p>
                <h2 class="text-xl font-black">Benefits & FAQs</h2>
            </div>
            <div class="grid gap-6 lg:grid-cols-2">
                <div>
                    <label class="text-sm font-bold text-slate-700">Benefits</label>
                    <div class="mt-2 space-y-3">
                        @for($i = 0; $i < max(4, count($benefits)); $i++)
                            <input class="w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500" name="benefits[]" value="{{ $benefits[$i] ?? '' }}" maxlength="180" placeholder="Benefit {{ $i + 1 }}">
                        @endfor
                    </div>
                    @error('benefits.*')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-sm font-bold text-slate-700">FAQs</label>
                    <div class="mt-2 space-y-4">
                        @for($i = 0; $i < max(3, count($faqs)); $i++)
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-3">
                                <input class="w-full rounded-xl border-slate-200 px-3 py-2 text-sm focus:border-blue-500 focus:ring-blue-500" name="faqs[{{ $i }}][question]" value="{{ $faqs[$i]['question'] ?? '' }}" maxlength="180" placeholder="Question">
                                <textarea class="mt-2 w-full rounded-xl border-slate-200 px-3 py-2 text-sm focus:border-blue-500 focus:ring-blue-500" name="faqs[{{ $i }}][answer]" rows="2" maxlength="600" placeholder="Answer">{{ $faqs[$i]['answer'] ?? '' }}</textarea>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-6">
                <p class="text-sm font-bold uppercase tracking-wide text-blue-600">SEO</p>
                <h2 class="text-xl font-black">Search metadata</h2>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="text-sm font-bold text-slate-700" for="meta_title">Meta title</label>
                    <input id="meta_title" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('meta_title') border-red-400 @enderror" name="meta_title" value="{{ old('meta_title', $service->meta_title) }}" maxlength="180">
                    @error('meta_title')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-sm font-bold text-slate-700" for="meta_description">Meta description</label>
                    <input id="meta_description" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('meta_description') border-red-400 @enderror" name="meta_description" value="{{ old('meta_description', $service->meta_description) }}" maxlength="255">
                    @error('meta_description')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </section>
    </div>

    <aside class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-xl font-black">Publish</h2>
            <label class="mt-5 flex items-center justify-between rounded-2xl bg-slate-50 p-4">
                <span>
                    <span class="block font-bold text-slate-800">Active on website</span>
                    <span class="text-sm text-slate-500">Disable to keep this as a draft.</span>
                </span>
                <input type="hidden" name="is_active" value="0">
                <input class="h-5 w-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500" type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->exists ? $service->is_active : true))>
            </label>
            <button class="mt-5 w-full rounded-2xl bg-blue-600 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-700">Save Service</button>
            <a href="{{ route('backend.services.index') }}" class="mt-3 block rounded-2xl border border-slate-200 px-5 py-3 text-center text-sm font-bold text-slate-700 transition hover:bg-slate-50">Cancel</a>
        </section>

        <section
            class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm"
            x-data="{ iconClass: '{{ old('icon_class', $service->icon_class ?: 'fa-solid fa-broom') }}' }"
        >
            <h2 class="text-xl font-black">Service icon</h2>
            <p class="mt-1 text-sm text-slate-500">Use Font Awesome 6 Pro classes. Recommended style: solid icons, 18-22px on frontend.</p>
            <div class="mt-4 flex items-center gap-4 rounded-2xl bg-slate-50 p-4">
                <span class="grid h-14 w-14 place-items-center rounded-2xl bg-blue-600 text-xl text-white">
                    <i :class="iconClass"></i>
                </span>
                <div class="min-w-0">
                    <p class="text-sm font-black text-slate-900">Live preview</p>
                    <p class="truncate text-xs font-semibold text-slate-500" x-text="iconClass"></p>
                </div>
            </div>
            <label class="mt-4 block text-sm font-bold text-slate-700" for="icon_class">Icon class</label>
            <input id="icon_class" x-model="iconClass" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 @error('icon_class') border-red-400 @enderror" name="icon_class" value="{{ old('icon_class', $service->icon_class) }}" maxlength="80" placeholder="fa-solid fa-broom">
            @error('icon_class')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            <div class="mt-4 flex flex-wrap gap-2">
                @foreach(['fa-solid fa-building', 'fa-solid fa-broom', 'fa-solid fa-spray-can-sparkles', 'fa-solid fa-house-chimney', 'fa-solid fa-soap', 'fa-solid fa-briefcase', 'fa-solid fa-hand-sparkles', 'fa-solid fa-warehouse'] as $iconOption)
                    <button type="button" class="grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white text-blue-700 transition hover:border-blue-300 hover:bg-blue-50" @click="iconClass = '{{ $iconOption }}'" title="{{ $iconOption }}">
                        <i class="{{ $iconOption }}"></i>
                    </button>
                @endforeach
            </div>
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm" x-data="{ preview: '{{ $service->image ? asset('frontend/assets/img/'.$service->image) : '' }}' }">
            <h2 class="text-xl font-black">Service image</h2>
            <p class="mt-1 text-sm text-slate-500">Best frontend size: 1000 x 600px (5:3), JPG/PNG/WebP, under 2MB. Keep the subject centered for clean card cropping.</p>
            <div class="mt-4 overflow-hidden rounded-3xl border border-dashed border-slate-300 bg-slate-50">
                <template x-if="preview">
                    <img :src="preview" alt="Preview" class="w-full object-cover" style="aspect-ratio: 5 / 3;">
                </template>
                <div x-show="!preview" class="grid w-full place-items-center text-center text-sm font-bold text-slate-400" style="aspect-ratio: 5 / 3;">Image preview</div>
            </div>
            <input type="hidden" name="image" value="{{ old('image', $service->image) }}">
            <input class="mt-4 block w-full rounded-2xl border border-slate-200 bg-white p-2 text-sm file:mr-4 file:rounded-xl file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-bold file:text-blue-700" type="file" name="image_file" accept="image/png,image/jpeg,image/webp" @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : preview">
            @error('image_file')<p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
            @if($service->image)
                <label class="mt-4 flex items-center gap-2 text-sm font-bold text-red-600">
                    <input type="checkbox" name="remove_image" value="1" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                    Remove current image
                </label>
            @endif
        </section>
    </aside>
</form>
