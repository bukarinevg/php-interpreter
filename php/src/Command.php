<?php
declare(strict_types=1);

namespace src;


class Command
{
    public function __construct(
        private readonly string $command, 
        private int $counter = 0, 
        private(set) array $tokens = [] 
    )
    {
        $lexer = new Lexer($this->command);
        $this->tokens = $lexer->tokenize();
    }
}