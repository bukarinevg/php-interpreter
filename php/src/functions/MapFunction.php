<?php

declare(strict_types=1);

namespace src\functions;

class MapFunction
{
    public function execute(array $arguments)
    {
        $keys = $arguments[0];
        $values = $arguments[1];

        if (count($keys) !== count($values)) {
            throw new \InvalidArgumentException("Map function requires equal number of keys and values.");
        }

        for ($i = 0; $i < count($keys); $i++) {
            if (!is_string($keys[$i])) {
                throw new \InvalidArgumentException("Keys must be strings.");
            }
            
            $result[$keys[$i]] = $values[$i];
        }

        return $result;
    }
}
