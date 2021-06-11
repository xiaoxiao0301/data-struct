<?php

use queue\deque\LoopDeque;

require_once 'LoopDeque.php';


$loopDeque = new LoopDeque(10);

var_dump($loopDeque->isFull());
var_dump($loopDeque->isEmpty());

$loopDeque->addFront(10);
echo $loopDeque . PHP_EOL;
$loopDeque->addFront(12);
echo $loopDeque . PHP_EOL;
echo $loopDeque->getFrontData() .PHP_EOL;
