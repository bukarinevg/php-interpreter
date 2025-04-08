<?php

declare(strict_types=1);

namespace app\functions;


use Exception;

class GetArgFunction 
{
    public function execute(int $index, array $arguments): string | int
    {
        $argument =  $arguments[$index] ?? throw new Exception("Error Argument Index", 1);

        return ctype_digit((string)$argument) ? (int)$argument : (string)$argument;
    }
}