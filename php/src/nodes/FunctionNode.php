<?php

declare(strict_types=1);

namespace src\nodes;

class FunctionNode extends ASTNode
{
    public function __construct(
        private(set) string $name,
        private(set) array $args = [],
    ) {
    }
        
}