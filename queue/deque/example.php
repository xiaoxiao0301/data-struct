<?php

require_once 'Deque.php';

use queue\deque\ArrayDeque;

$deque = new ArrayDeque();

for ($i = 0; $i < 10; $i++) {
    $deque->addRear($i);
}
echo $deque . PHP_EOL;

for ($i = 100; $i < 110; $i++) {
    $deque->addFront($i);
}
echo $deque . PHP_EOL;

echo $deque->removeFront() . PHP_EOL;
echo $deque. PHP_EOL;

echo $deque->removeRear() . PHP_EOL;
echo $deque . PHP_EOL;

if ($deque->isEmpty()) {
    echo "空";
} else {
    echo "非空";
}