<?php

namespace App\Services\Backend;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageUploadService
{
    public function storeFrontendImage(UploadedFile $file, string $folder): string
    {
        $folder = trim($folder, '/');
        $destination = public_path("frontend/assets/img/uploads/{$folder}");

        File::ensureDirectoryExists($destination);

        $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = $name.'-'.now()->format('YmdHis').'-'.Str::random(6).'.'.$extension;

        $file->move($destination, $filename);

        return "uploads/{$folder}/{$filename}";
    }

    public function storeAdminAvatar(UploadedFile $file): string
    {
        return $this->storeFrontendImage($file, 'admin');
    }

    public function deleteFrontendImage(?string $path): void
    {
        if (! $path || ! str_starts_with($path, 'uploads/')) {
            return;
        }

        File::delete(public_path('frontend/assets/img/'.$path));
    }
}
