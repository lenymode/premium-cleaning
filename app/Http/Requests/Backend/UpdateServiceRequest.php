<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;

class UpdateServiceRequest extends StoreServiceRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['slug'] = ['nullable', 'string', 'max:180', Rule::unique('services', 'slug')->ignore($this->route('service'))];

        return $rules;
    }
}
