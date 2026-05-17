@extends('backend.layouts.app', ['title' => 'Profile & Settings'])

@section('content')
<div class="grid gap-6 xl:grid-cols-[1fr_420px]">
    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Admin account</p>
            <h2 class="text-2xl font-black">Profile settings</h2>
            <p class="mt-1 text-sm text-slate-500">Manage the account shown in the admin topbar and dropdown.</p>
        </div>

        <form method="POST" action="{{ route('backend.settings.update') }}" enctype="multipart/form-data" class="grid gap-6 lg:grid-cols-[220px_1fr]" x-data="{ preview: '{{ $user->avatarUrl() ?: '' }}' }">
            @csrf
            @method('PATCH')

            <div>
                <div class="overflow-hidden rounded-3xl border border-dashed border-slate-300 bg-slate-50">
                    <template x-if="preview">
                        <img :src="preview" alt="Avatar preview" class="h-56 w-full object-cover">
                    </template>
                    <div x-show="!preview" class="grid h-56 place-items-center bg-blue-600 text-5xl font-black text-white">{{ $user->initials() }}</div>
                </div>
                <p class="mt-3 text-xs font-medium text-slate-500">Best avatar size: square 400 x 400px. JPG, PNG or WebP under 2MB.</p>
                <input class="mt-4 block w-full rounded-2xl border border-slate-200 bg-white p-2 text-sm file:mr-4 file:rounded-xl file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-bold file:text-blue-700" type="file" name="avatar_file" accept="image/png,image/jpeg,image/webp" @change="preview = $event.target.files[0] ? URL.createObjectURL($event.target.files[0]) : preview">
                @error('avatar_file')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
                @if($user->avatar_path)
                    <label class="mt-4 flex items-center gap-2 text-sm font-bold text-red-600">
                        <input type="checkbox" name="remove_avatar" value="1" class="rounded border-slate-300 text-red-600 focus:ring-red-500">
                        Remove current avatar
                    </label>
                @endif
            </div>

            <div class="space-y-5">
                <div>
                    <label class="text-sm font-bold text-slate-700" for="name">Name</label>
                    <input id="name" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-400 @enderror" name="name" value="{{ old('name', $user->name) }}" required maxlength="255">
                    @error('name')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-sm font-bold text-slate-700" for="email">Email</label>
                    <input id="email" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('email') border-red-400 @enderror" type="email" name="email" value="{{ old('email', $user->email) }}" required maxlength="255">
                    @error('email')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
                <button class="rounded-2xl bg-blue-600 px-5 py-3 text-sm font-black text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-700">Save Profile</button>
            </div>
        </form>
    </section>

    <aside class="space-y-6">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-6">
                <p class="text-sm font-bold uppercase tracking-wide text-blue-600">Security</p>
                <h2 class="text-xl font-black">Change password</h2>
            </div>
            <form method="POST" action="{{ route('backend.settings.password') }}" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label class="text-sm font-bold text-slate-700" for="current_password">Current password</label>
                    <input id="current_password" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('current_password') border-red-400 @enderror" type="password" name="current_password" autocomplete="current-password" required>
                    @error('current_password')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-sm font-bold text-slate-700" for="password">New password</label>
                    <input id="password" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500 @error('password') border-red-400 @enderror" type="password" name="password" autocomplete="new-password" required>
                    @error('password')<p class="mt-2 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="text-sm font-bold text-slate-700" for="password_confirmation">Confirm password</label>
                    <input id="password_confirmation" class="mt-2 w-full rounded-2xl border-slate-200 bg-slate-50 px-4 py-3 focus:border-blue-500 focus:ring-blue-500" type="password" name="password_confirmation" autocomplete="new-password" required>
                </div>
                <button class="w-full rounded-2xl bg-slate-950 px-5 py-3 text-sm font-black text-white transition hover:bg-slate-800">Update Password</button>
            </form>
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-xl font-black">Admin tips</h2>
            <ul class="mt-4 space-y-3 text-sm text-slate-600">
                <li class="rounded-2xl bg-slate-50 p-3">Use WebP or compressed JPG images for fast frontend loading.</li>
                <li class="rounded-2xl bg-slate-50 p-3">Keep service excerpts short so carousel cards stay even.</li>
                <li class="rounded-2xl bg-slate-50 p-3">Use sort order to control frontend display priority.</li>
            </ul>
        </section>
    </aside>
</div>
@endsection
