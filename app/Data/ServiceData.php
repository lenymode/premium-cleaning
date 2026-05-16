<?php

namespace App\Data;

final class ServiceData
{
    public function __construct(
        public readonly string $title,
        public readonly string $slug,
        public readonly string $excerpt,
        public readonly string $description,
        public readonly array $benefits,
        public readonly array $faqs,
        public readonly string $image,
        public readonly string $metaTitle,
        public readonly string $metaDescription,
    ) {
    }
}
