<?php

declare(strict_types=1);

namespace app\functions;

class ConcatFunction 
{
    public function execute(string $first, string $second): string
    {
        return $first . $second;
    }
}