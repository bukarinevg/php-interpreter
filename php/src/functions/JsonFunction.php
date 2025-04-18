<?php

declare(strict_types=1);

namespace src\functions;

class JsonFunction
{
    public function execute(array $arguments ) : string | false
    {
        $keyValueArray = $arguments[0];
        
        return json_encode(
            $keyValueArray
        );            
    }
}