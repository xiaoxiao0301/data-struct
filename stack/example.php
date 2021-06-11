<?php

require_once 'ArrayStack.php';

$stack = new \stack\ArrayStack();
for ($i = 0; $i < 10; $i++) {
    try {
        $result = rand(0, pow($i + 1, 2));
        echo $result . PHP_EOL;
        $stack->push($result);
    } catch (Exception $e) {
        echo "add element to stack err: " . $e->getMessage();
    }
}

echo $stack . PHP_EOL;

echo "栈顶元素:" . $stack->peek() . PHP_EOL;

echo $stack->pop() . PHP_EOL;

echo $stack->pop() . PHP_EOL;

echo $stack . PHP_EOL;


