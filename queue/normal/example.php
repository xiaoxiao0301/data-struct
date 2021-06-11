<?php

use queue\normal\ArrayQueue;
use queue\normal\LoopQueue;

require_once 'ArrayQueue.php';

require_once 'LoopQueue.php';

/*
$normalQueue = new ArrayQueue();

for ($i = 0; $i < 10; $i++) {
    $normalQueue->enqueue($i);
    echo $normalQueue . PHP_EOL;
    if ($i % 3 == 2) {
        $normalQueue->dequeue();
        echo $normalQueue . PHP_EOL;
    }
}

*/

$loopQueue = new LoopQueue(10);
$loopQueue->enqueue(10);
$loopQueue->enqueue(12);
echo $loopQueue . PHP_EOL;
echo $loopQueue->getRearData() . PHP_EOL;
echo $loopQueue->getFrontData() . PHP_EOL;

