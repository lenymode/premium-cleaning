<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;

class UpdateLocationRequest extends StoreLocationRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['slug'] = ['nullable', 'string', 'max:160', Rule::unique('locations', 'slug')->ignore($this->route('location'))];

        return $rules;
    }
}
