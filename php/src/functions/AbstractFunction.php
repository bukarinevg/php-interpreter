<?php

declare(strict_types=1);

namespace app\functions;

class AbstractFunction
{
    public function __construct(
        public readonly string $name,
        public readonly array $args = [],
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
}