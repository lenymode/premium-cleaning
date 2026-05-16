<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Backend\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('backend.settings.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request, ImageUploadService $images): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$request->user()->id],
            'avatar_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048', 'dimensions:min_width=160,min_height=160,max_width=1600,max_height=1600'],
            'remove_avatar' => ['nullable', 'boolean'],
        ]);

        $user = $request->user();
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->hasFile('avatar_file')) {
            $images->deleteFrontendImage($user->avatar_path);
            $user->avatar_path = $images->storeAdminAvatar($request->file('avatar_file'));
        } elseif ($request->boolean('remove_avatar')) {
            $images->deleteFrontendImage($user->avatar_path);
            $user->avatar_path = null;
        }

        $user->save();

        return back()->with('status', 'Profile settings updated.');
    }

    public function password(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'Password updated securely.');
    }
}
