<?php

declare(strict_types=1);

namespace src\functions;

use Exception;

class GetArgFunction 
{
    public function execute(array $arguments): string | int
    {
        if (count($arguments) !== 1) {
            throw new Exception("Invadlid call of GetArg function.");
        }

        $index = $arguments[0];
        $argv = $GLOBALS['COMMAND_ARGUMENTS'];

        if (!is_numeric($index) || $index < 0 || $index + 1 > count($argv)) {
            throw new Exception("Invalid argument index for function getArg = $index.");
        }

        return $argv[$index] ?? null;
    }
}