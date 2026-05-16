<?php

namespace App\Data;

final class TestimonialData
{
    public function __construct(
        public readonly string $name,
        public readonly string $role,
        public readonly string $quote,
        public readonly int $rating = 5,
        public readonly ?string $company = null,
    ) {
    }
}
