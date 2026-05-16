<form class="rounded bg-white p-6 shadow-sm space-y-4" method="POST" action="{{ $action }}">
    @csrf
    @if($method !== 'POST') @method($method) @endif
    <div><label class="block text-sm font-medium">Name</label><input class="mt-1 w-full rounded border-gray-300" name="name" value="{{ old('name', $location->name) }}" required></div>
    <div><label class="block text-sm font-medium">Slug</label><input class="mt-1 w-full rounded border-gray-300" name="slug" value="{{ old('slug', $location->slug) }}"></div>
    <div><label class="block text-sm font-medium">County</label><input class="mt-1 w-full rounded border-gray-300" name="county" value="{{ old('county', $location->county) }}"></div>
    <div><label class="block text-sm font-medium">Postcode Area</label><input class="mt-1 w-full rounded border-gray-300" name="postcode_area" value="{{ old('postcode_area', $location->postcode_area) }}"></div>
    <div><label class="block text-sm font-medium">Description</label><textarea class="mt-1 w-full rounded border-gray-300" rows="5" name="description">{{ old('description', $location->description) }}</textarea></div>
    <div><label class="inline-flex items-center gap-2"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $location->is_active))> Active</label></div>
    <button class="rounded bg-blue-700 px-4 py-2 text-white">Save Location</button>
</form>
