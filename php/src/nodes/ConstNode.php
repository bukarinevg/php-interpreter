<?php

declare(strict_types=1);

namespace src\nodes;

class ConstNode extends ASTNode {

    public function __construct(private(set) mixed $value) {
        
    }
}