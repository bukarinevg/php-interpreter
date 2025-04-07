<?php

declare(strict_types=1);

namespace app\enums;

enum Functions : string
{
    case GET_ARG = "getArg";

    case ARRAY = "array";

    case MAP = "map";

    case JSON = "json";

    case CONCAT = "concat";
}