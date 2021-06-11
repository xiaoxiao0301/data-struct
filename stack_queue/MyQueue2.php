<?php


namespace stack_queue;

use Exception;
use stack\ArrayStack;

require_once __DIR__ . '/../stack/ArrayStack.php';

/**
 * 用栈来实现队列
 * Class MyQueue
 * @package stack_queue
 */
class MyQueue2
{
    // 队列： 先进先出   栈： 先进后出， 入栈和出栈的一端称之为栈顶

    /**
     * @var ArrayStack
     */
    private ArrayStack $stack;

    /**
     * @var ArrayStack
     */
    private ArrayStack $arrayStack;

    /**
     * MyQueue constructor.
     */
    public function __construct()
    {
        $this->stack = new ArrayStack();
        $this->arrayStack = new ArrayStack();
    }

    /**
     * 将元素 x 推到队列的末尾
     * @throws Exception
     */
    public function push($item)
    {
        while (!$this->stack->isEmpty()) {
            $this->arrayStack->push($this->stack->pop());
        }
        $this->arrayStack->push($item);
        while (!$this->arrayStack->isEmpty()) {
            $this->stack->push($this->arrayStack->pop());
        }
    }

    /**
     * 从队列的开头移除并返回元素
     * @throws Exception
     */
    public function pop()
    {
       return $this->stack->pop();
    }

    /**
     * 返回队列开头的元素
     * @throws Exception
     */
    public function peek()
    {
        return $this->stack->peek();
    }

    /**
     * 队列为空，返回 true ；否则，返回 false
     */
    public function empty(): bool
    {
       return $this->stack->isEmpty();
    }

}

$queue = new MyQueue2();


$queue->push(10);
$queue->push(20);
$queue->push(30);
$queue->push(40);

echo $queue->peek() . PHP_EOL;

echo $queue->pop() . PHP_EOL;

echo $queue->peek() . PHP_EOL;