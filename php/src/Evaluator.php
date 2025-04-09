<?php
declare(strict_types=1);

namespace src;

use Exception;
use src\nodes\ASTNode;
use src\nodes\ConstNode;
use src\nodes\FunctionNode;
use src\enums\Functions;

class Evaluator
{
    public function evaluate(ASTNode $node): mixed
    {
        if ($node instanceof ConstNode) {
            return $node->value;
        }

        if ($node instanceof FunctionNode) {

            $evaluatedArgs = [];
            foreach ($node->args as $child) {
                $evaluatedArgs[] = $this->evaluate($child);
            }

            try {
                $functionEnum = Functions::from($node->name);
            } catch (\ValueError $e) {
                throw new Exception("Invalid Function : '{$node->name}'");
            }

            $handler = new ($functionEnum->getFunction());

            return $handler->execute($evaluatedArgs);
        }

        return null;
    }
}
