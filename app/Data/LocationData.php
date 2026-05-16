<?php

namespace App\Data;

final class LocationData
{
    public function __construct(
        public readonly string $name,
        public readonly string $slug,
        public readonly string $description,
        public readonly ?string $postcodeArea = null,
    ) {
    }
}
