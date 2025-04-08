<?php

declare(strict_types=1);

namespace app\functions;


class JsonFunction
{
    public function execute(array $keyValueArray ) : string | false
    {
        if (count($keyValueArray) !== 2) {
            throw new \InvalidArgumentException("Json function requires exactly 2 arguments.");
        }

        return json_encode([
            $keyValueArray[0] => $keyValueArray[1]
        ]);            
    }
}