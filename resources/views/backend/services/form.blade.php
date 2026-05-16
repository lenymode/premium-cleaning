<form class="rounded bg-white p-6 shadow-sm space-y-4" method="POST" action="{{ $action }}">
    @csrf
    @if($method !== 'POST') @method($method) @endif
    <div><label class="block text-sm font-medium">Title</label><input class="mt-1 w-full rounded border-gray-300" name="title" value="{{ old('title', $service->title) }}" required></div>
    <div><label class="block text-sm font-medium">Slug</label><input class="mt-1 w-full rounded border-gray-300" name="slug" value="{{ old('slug', $service->slug) }}"></div>
    <div><label class="block text-sm font-medium">Excerpt</label><textarea class="mt-1 w-full rounded border-gray-300" name="excerpt" required>{{ old('excerpt', $service->excerpt) }}</textarea></div>
    <div><label class="block text-sm font-medium">Description</label><textarea class="mt-1 w-full rounded border-gray-300" rows="8" name="description" required>{{ old('description', $service->description) }}</textarea></div>
    <div><label class="block text-sm font-medium">Image Path</label><input class="mt-1 w-full rounded border-gray-300" name="image" value="{{ old('image', $service->image) }}"></div>
    <div><label class="block text-sm font-medium">Meta Title</label><input class="mt-1 w-full rounded border-gray-300" name="meta_title" value="{{ old('meta_title', $service->meta_title) }}"></div>
    <div><label class="block text-sm font-medium">Meta Description</label><input class="mt-1 w-full rounded border-gray-300" name="meta_description" value="{{ old('meta_description', $service->meta_description) }}"></div>
    <div><label class="inline-flex items-center gap-2"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active))> Active</label></div>
    <button class="rounded bg-blue-700 px-4 py-2 text-white">Save Service</button>
</form>
