<?php
declare(strict_types=1);

namespace app;


class Interpretator
{
    public function __construct(private readonly array $args, private readonly string $commandText)
    {
    }

    public function interpret()
    {
        $command = new Command($this->commandText);        
    }
}