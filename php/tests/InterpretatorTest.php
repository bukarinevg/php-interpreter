<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use src\Interpretator;

final class InterpretatorTest extends TestCase
{
    /**
     * Test base command 
     */
    public function testGetArgFunction(): void
    {
        $commandText = 'json(map(array("message"), array(concat("Hello, ", getArg(0)))))';

        $args = ['world'];

        $interpretator = new Interpretator($commandText, $args);

        $result = $interpretator->interpret();

        $expected = '{"message":"Hello, world"}';

        $this->assertEquals($expected, $result);
    }
    
    /**
     */
    public function testConstant(): void
    {
        $commandText = 'json("simple text")';
        $args = [];
        $interpretator = new Interpretator($commandText, $args);
        $result = $interpretator->interpret();

        $expected = '"simple text"';

        $this->assertEquals($expected, $result);
    }
    
    /**
     * Test concat.
     */
    public function testConcatFunction(): void
    {
        $commandText = 'concat("Foo", "Bar")';
        $args = [];
        $interpretator = new Interpretator($commandText, $args);
        $result = $interpretator->interpret();
        
        $expected = 'FooBar';
        
        $this->assertEquals($expected, $result);
    }

    /**
     * Test array.
     */

    public function testArrayFunction(): void
    {
        $commandText = 'array("Foo", "Bar")';
        $args = [];
        $interpretator = new Interpretator($commandText, $args);
        $result = $interpretator->interpret();
        
        $expected = ["Foo","Bar"];
        
        $this->assertEquals($expected, $result);
    }
}
