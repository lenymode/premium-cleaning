<?php

namespace App\Services\Backend;

use App\Models\Service;
use DOMDocument;
use DOMElement;
use DOMXPath;
use Illuminate\Support\Str;

class ServiceManagementService
{
    private const ALLOWED_RICH_TEXT_TAGS = '<p><br><strong><b><em><i><u><s><a><ul><ol><li><blockquote><pre><code><h2><h3><span>';
    private const ALLOWED_STYLES = ['color', 'background-color', 'text-align'];

    public function __construct(private readonly ImageUploadService $images)
    {
    }

    public function create(array $data): Service
    {
        $imageFile = $data['image_file'] ?? null;
        unset($data['image_file'], $data['remove_image']);

        if ($imageFile) {
            $data['image'] = $this->images->storeFrontendImage($imageFile, 'services');
        }

        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug($data['title']);
        $data['icon_class'] = filled($data['icon_class'] ?? null) ? trim($data['icon_class']) : 'fa-solid fa-broom';
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['description'] = $this->sanitizeRichText($data['description'] ?? '');
        $data['benefits'] = $this->cleanList($data['benefits'] ?? []);
        $data['faqs'] = $this->cleanFaqs($data['faqs'] ?? []);

        return Service::create($data);
    }

    public function update(Service $service, array $data): Service
    {
        $imageFile = $data['image_file'] ?? null;
        $removeImage = (bool) ($data['remove_image'] ?? false);
        unset($data['image_file'], $data['remove_image']);

        if ($imageFile) {
            $this->images->deleteFrontendImage($service->image);
            $data['image'] = $this->images->storeFrontendImage($imageFile, 'services');
        } elseif ($removeImage) {
            $this->images->deleteFrontendImage($service->image);
            $data['image'] = null;
        }

        $data['slug'] = filled($data['slug'] ?? null) ? $data['slug'] : Str::slug($data['title']);
        $data['icon_class'] = filled($data['icon_class'] ?? null) ? trim($data['icon_class']) : 'fa-solid fa-broom';
        $data['is_active'] = (bool) ($data['is_active'] ?? false);
        $data['description'] = $this->sanitizeRichText($data['description'] ?? '');
        $data['benefits'] = $this->cleanList($data['benefits'] ?? []);
        $data['faqs'] = $this->cleanFaqs($data['faqs'] ?? []);
        $service->update($data);

        return $service;
    }

    private function cleanList(array $items): array
    {
        return array_values(array_filter(array_map(
            fn ($item) => trim((string) $item),
            $items,
        )));
    }

    private function cleanFaqs(array $faqs): array
    {
        return array_values(array_filter(array_map(function ($faq) {
            $question = trim((string) ($faq['question'] ?? ''));
            $answer = trim((string) ($faq['answer'] ?? ''));

            return $question && $answer ? compact('question', 'answer') : null;
        }, $faqs)));
    }

    private function sanitizeRichText(string $html): string
    {
        $html = trim(strip_tags($html, self::ALLOWED_RICH_TEXT_TAGS));

        if ($html === '' || ! class_exists(DOMDocument::class)) {
            return $html;
        }

        $document = new DOMDocument();

        libxml_use_internal_errors(true);
        $document->loadHTML('<div>'.$html.'</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $xpath = new DOMXPath($document);

        foreach ($xpath->query('//*') as $element) {
            if (! $element instanceof DOMElement) {
                continue;
            }

            foreach (iterator_to_array($element->attributes) as $attribute) {
                $name = strtolower($attribute->name);
                $value = trim($attribute->value);

                if (str_starts_with($name, 'on')) {
                    $element->removeAttribute($attribute->name);
                    continue;
                }

                if ($name === 'href') {
                    if (! preg_match('/^(https?:|mailto:|tel:|#|\/)/i', $value)) {
                        $element->removeAttribute('href');
                    }

                    continue;
                }

                if ($name === 'target') {
                    $element->setAttribute('target', '_blank');
                    $element->setAttribute('rel', 'noopener noreferrer');
                    continue;
                }

                if ($name === 'style') {
                    $style = $this->sanitizeStyle($value);

                    if ($style) {
                        $element->setAttribute('style', $style);
                    } else {
                        $element->removeAttribute('style');
                    }

                    continue;
                }

                if (! in_array($name, ['class', 'rel'], true)) {
                    $element->removeAttribute($attribute->name);
                }
            }
        }

        $container = $document->documentElement;
        $clean = '';

        foreach ($container->childNodes as $child) {
            $clean .= $document->saveHTML($child);
        }

        return trim($clean);
    }

    private function sanitizeStyle(string $style): string
    {
        $declarations = [];

        foreach (explode(';', $style) as $declaration) {
            [$property, $value] = array_pad(explode(':', $declaration, 2), 2, '');
            $property = strtolower(trim($property));
            $value = trim($value);

            if (! in_array($property, self::ALLOWED_STYLES, true)) {
                continue;
            }

            if (preg_match('/expression|javascript|url\s*\(/i', $value)) {
                continue;
            }

            $declarations[] = "{$property}: {$value}";
        }

        return implode('; ', $declarations);
    }
}
