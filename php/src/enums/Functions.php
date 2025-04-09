<?php

declare(strict_types=1);

namespace src\enums;

use src\functions\{
    ArrayFunction,
    ConcatFunction,
    GetArgFunction,
    JsonFunction,
    MapFunction,
};

enum Functions : string
{
    case GET_ARG = "getArg";

    case ARRAY = "array";

    case MAP = "map";

    case JSON = "json";

    case CONCAT = "concat";

    public function getFunction(): string
    {
        return match ($this) {
            self::GET_ARG => GetArgFunction::class,
            self::ARRAY => ArrayFunction::class,
            self::MAP => MapFunction::class,
            self::JSON => JsonFunction::class,
            self::CONCAT => ConcatFunction::class,
        };
    }
}