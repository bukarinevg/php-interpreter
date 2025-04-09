<?php
declare(strict_types=1);

namespace app;

use Exception;
use app\nodes\ASTNode;
use app\nodes\ConstNode;
use app\nodes\FunctionNode;
use app\enums\Functions;

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
