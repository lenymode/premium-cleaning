<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;

class SiteSettingsService
{
    public function all(): array
    {
        if (! $this->tableExists()) {
            return [];
        }

        return SiteSetting::query()
            ->pluck('value', 'key')
            ->filter(fn ($value) => filled($value))
            ->all();
    }

    public function tableExists(): bool
    {
        return Schema::hasTable('site_settings');
    }

    public function applyToConfig(): void
    {
        foreach ($this->all() as $key => $value) {
            config(["site.{$key}" => $value]);
        }

        config(['site.phone_link' => $this->phoneLink(config('site.phone'))]);
    }

    public function values(): array
    {
        return array_merge(config('site'), $this->all());
    }

    public function update(array $values): void
    {
        foreach ($values as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => is_string($value) ? trim($value) : $value]
            );
        }
    }

    public function phoneLink(?string $phone): string
    {
        if (! $phone) {
            return '';
        }

        $cleaned = preg_replace('/[^\d+]/', '', $phone);

        return $cleaned ?: $phone;
    }
}
