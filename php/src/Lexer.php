<?php
declare(strict_types=1);

namespace src;

use Exception;

class Lexer{    
    public function __construct(
        private string $input, 
        private int $length = 0, 
        private int $pointer = 0
    ) 
    {
        $this->length = strlen($this->input);
    }
    
    /**
     * @return Token[]
     */
    public function tokenize(): array {
        $tokens = [];
        
        while ($this->pointer < $this->length) {
            $char = $this->getCurrentSymb();
            $token = null;
            
            match (true) {
                ctype_space($char) => $this->getCurrentSymbAndMove(),
                $char === '(' => $tokens[] = new Token('LPAREN', '(') ,
                $char === ')' => $tokens[] = new Token('RPAREN', ')'),
                $char === ',' => $tokens[] = new Token('COMMA', ','),
                $char === '"' => $tokens[] = new Token('STRING', $this->readString()),
                ctype_digit($char) => $tokens[] = new Token('NUMBER', $this->readNumber()),
                ctype_alpha($char) => $tokens[] = new Token('IDENTIFIER', $this->readIdentifier()),

                default => throw new Exception("Invalid symbol '{$char}' index: {$this->pointer}"),
            };

            if ( in_array($char, ['(', ')', ',']) ) {
                $this->pointer++;
            }
        }
        
        return $tokens;
    }
    
    private function getCurrentSymb(): string {
        return $this->input[$this->pointer];
    }
    
    private function getCurrentSymbAndMove(): string {
        
        return $this->input[$this->pointer++];
    }
    
    private function readString(): string {
        $result = '';
        $this->pointer++; 
        
        while ($this->pointer < $this->length && $this->getCurrentSymb() !== '"') {
            $result .= $this->getCurrentSymbAndMove();
        }
        
        if ($this->pointer >= $this->length) {
            throw new Exception("Invalid command index = {$this->pointer}");
        }
        
        $this->pointer++;
        
        return $result;
    }
    
    private function readNumber(): string {
        $result = '';
        $hasDot = false;
        
        while ($this->pointer < $this->length) {
            $char = $this->getCurrentSymb();
            if (ctype_digit($char)) {
                $result .= $this->getCurrentSymbAndMove();
            } elseif ($char === '.' && !$hasDot) {
                $hasDot = true;
                $result .= $this->getCurrentSymbAndMove();
            } else {
                break;
            }
        }
        
        return $result;
    }

    private function readIdentifier(): string {
        $result = '';
        
        while ($this->pointer < $this->length) {
            $char = $this->getCurrentSymb();
            if (ctype_alnum($char) || $char === '_') {
                $result .= $this->getCurrentSymbAndMove();
            } else {
                break;
            }
        }
        
        return $result;
    }
}