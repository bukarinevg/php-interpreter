<?php

declare(strict_types=1);

namespace app\functions;


class MapFunction
{
    public function execute(array $keys, array $values)
    {
        if (count($keys) !== count($values)) {
            throw new \InvalidArgumentException("Map function requires equal number of keys and values.");
        }

        $result = [];

        foreach ($keys as $index => $key) {
            $result[$key] = $values[$index];
        }

        return $result;
    }
}
