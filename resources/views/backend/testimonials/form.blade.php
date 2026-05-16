<form class="rounded bg-white p-6 shadow-sm space-y-4" method="POST" action="{{ $action }}">
    @csrf
    @if($method !== 'POST') @method($method) @endif
    <div><label class="block text-sm font-medium">Name</label><input class="mt-1 w-full rounded border-gray-300" name="name" value="{{ old('name', $testimonial->name) }}" required></div>
    <div><label class="block text-sm font-medium">Role</label><input class="mt-1 w-full rounded border-gray-300" name="role" value="{{ old('role', $testimonial->role) }}"></div>
    <div><label class="block text-sm font-medium">Company</label><input class="mt-1 w-full rounded border-gray-300" name="company" value="{{ old('company', $testimonial->company) }}"></div>
    <div><label class="block text-sm font-medium">Quote</label><textarea class="mt-1 w-full rounded border-gray-300" rows="6" name="quote" required>{{ old('quote', $testimonial->quote) }}</textarea></div>
    <div><label class="block text-sm font-medium">Rating</label><input class="mt-1 w-full rounded border-gray-300" type="number" min="1" max="5" name="rating" value="{{ old('rating', $testimonial->rating ?? 5) }}" required></div>
    <div><label class="inline-flex items-center gap-2"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $testimonial->is_active))> Active</label></div>
    <button class="rounded bg-blue-700 px-4 py-2 text-white">Save Testimonial</button>
</form>
