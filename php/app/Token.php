<?php

declare(strict_types=1);

namespace app;

class Token {
    public string $type;
    public string $value;
    
    public function __construct(string $type, string $value) {
        $this->type  = $type;
        $this->value = $value;
    }
    
    public function __toString() {
        return " ( type = {$this->type}, value =  {$this->value} )";
    }
}