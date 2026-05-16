<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:160'],
            'slug' => ['nullable', 'string', 'max:180', 'unique:services,slug'],
            'excerpt' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string'],
            'benefits' => ['nullable', 'array'],
            'benefits.*' => ['nullable', 'string', 'max:180'],
            'faqs' => ['nullable', 'array'],
            'faqs.*.question' => ['nullable', 'string', 'max:180'],
            'faqs.*.answer' => ['nullable', 'string', 'max:600'],
            'image' => ['nullable', 'string', 'max:255'],
            'icon_class' => ['nullable', 'string', 'max:80', 'regex:/^fa-(solid|regular|light|thin|brands|duotone|sharp|classic|kit|[a-z]+) fa-[a-z0-9-]+$/'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048', 'dimensions:min_width=400,min_height=260,max_width=3200,max_height=2200'],
            'remove_image' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:180'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
