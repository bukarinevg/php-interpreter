<?php
declare(strict_types=1);

namespace src;

class Interpretator
{
    public function __construct( private readonly string $commandText, private readonly array $commandArguments = [] )
    {
        $GLOBALS['COMMAND_ARGUMENTS'] = $this->commandArguments;
    }

    public function interpret()
    {
        $command = new Command($this->commandText);    
        $parser = new Parser($command->tokens);
        $ast = $parser->parse();

        $evaluator = new Evaluator;
        $result = $evaluator->evaluate($ast);

        echo PHP_EOL;
        print_R([
            'result' => $result,
        ]);
        echo PHP_EOL. PHP_EOL;
        
        return $result;
    }
}