<?php 
declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\Interpretator;


print_r([
    'params' => $params,
    'argv' => $argv,
]);

$interpretator = new Interpretator();

