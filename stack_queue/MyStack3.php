<?php

namespace stack_queue;

require_once __DIR__ . '/../queue/deque/LoopDeque.php';

use queue\deque\LoopDeque;

/**
 * 使用双端队列实现栈
 * Class MyStack3
 * @package stack_queue
 */
class MyStack3
{
    private LoopDeque $loopDeque;

    /**
     * MyStack3 constructor.
     */
    public function __construct()
    {
        $this->loopDeque = new LoopDeque(10);
    }

    public function push($item)
    {
        $this->loopDeque->addRear($item);
    }

    public function pop()
    {
        return $this->loopDeque->removeRear();
    }

    public function top()
    {
        return $this->loopDeque->getRearData();
    }

    /**
     * @return bool
     */
    public function empty(): bool
    {
        return $this->loopDeque->isEmpty();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->loopDeque;
    }
}

$myStack = new MyStack3();
$myStack->push(1);
$myStack->push(2);
$myStack->push(3);
$myStack->push(4);

echo $myStack . PHP_EOL;

var_dump($myStack->pop());

echo $myStack . PHP_EOL;

var_dump($myStack->top());

var_dump($myStack->empty());

$myStack->pop();
$myStack->pop();
$myStack->pop();

echo $myStack . PHP_EOL;

var_dump($myStack->empty());