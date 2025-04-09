<?php 
declare(strict_types=1);

require_once 'vendor/autoload.php';

use src\Interpretator;

array_shift($argv);

$command = file_get_contents("./command");

$interpretator = new Interpretator( $command, $argv);

try {
    $interpretator->interpret();
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}