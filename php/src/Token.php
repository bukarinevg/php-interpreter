<?php

declare(strict_types=1);

namespace src;

class Token {
    
    public function __construct(public readonly string $type, public readonly string $value) {
    }
    
    public function __toString() {
        return " ( type = {$this->type}, value =  {$this->value} )";
    }
}