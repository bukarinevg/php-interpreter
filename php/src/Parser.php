<?php
declare(strict_types=1);

namespace src;

use src\nodes\ASTNode;
use src\nodes\ConstNode;
use src\nodes\FunctionNode;

class Parser 
{
    /**
     * @param Token[] $tokens
     */
    public function __construct(private readonly array $tokens, private int $pos = 0) {
    }

    public function parse(): ASTNode {
        $token = $this->current();

        if ($token->type === 'NUMBER' || $token->type === 'STRING') {
            return new ConstNode($this->consume()->value);
        } elseif ($token->type === 'IDENTIFIER') {
            return $this->parseFunctionCall();
        }
        throw new \Exception("Unexpected token: {$token->type}");
    }

    private function current(): ?Token {
        return $this->tokens[$this->pos] ?? null;
    }

    private function consume(?string $expectedType = null): Token {
        $token = $this->current();
        $this->pos++;

        if (!$token) {
            throw new \Exception("Invalid command token = {$token}"); 
        }
        if ($expectedType && $token->type !== $expectedType) {
            throw new \Exception("Invalid token, expected type {$expectedType}, got {$token->type}");
        }

        return $token;
    }

    private function parseFunctionCall(): ASTNode {
        $nameToken = $this->consume('IDENTIFIER');
        $name = $nameToken->value;
        $args = [];

        if ($this->current() && $this->current()->type === 'LPAREN') {
            $this->consume('LPAREN');

            while ($this->current() && $this->current()->type !== 'RPAREN') {
                $args[] = $this->parse();

                if ($this->current() && $this->current()->type === 'COMMA') {
                    $this->consume('COMMA');
                } else {
                    break;
                }
            }
            $this->consume('RPAREN');
        }

        return new FunctionNode($name, $args);
    }
}