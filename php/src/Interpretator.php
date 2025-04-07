<?php
declare(strict_types=1);

namespace app;

class Interpretator
{
    public function __construct(private string $input = "")
    {

        echo "Interpretator created with input: $input\n";
    }

    public function interpret()
    {
       
    }
}