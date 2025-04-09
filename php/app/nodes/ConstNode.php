<?php

declare(strict_types=1);

namespace app\nodes;

class ConstNode extends ASTNode {

    public function __construct(private(set) mixed $value) {
        
    }
}