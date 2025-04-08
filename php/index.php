<?php 
declare(strict_types=1);

require_once 'vendor/autoload.php';

use app\Interpretator;

array_shift($argv);
$command = file_get_contents("./command");

$interpretator = new Interpretator($argv, $command);
$interpretator->interpret();


