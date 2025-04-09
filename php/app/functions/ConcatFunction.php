<?php

declare(strict_types=1);

namespace app\functions;

class ConcatFunction 
{
    public function execute(array $valuesAray): string
    {
        $result = '';
        foreach ($valuesAray as $value) {
            $result .= $value;
        }
        
        return $result;
    }
}