<?php

namespace App\Data;

final class QuoteRequestData
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $company,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $service,
        public readonly ?string $propertyType,
        public readonly ?string $postcode,
        public readonly ?string $message,
        public readonly string $source = 'website',
    ) {
    }
}
