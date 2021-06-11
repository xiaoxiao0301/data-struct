<?php


namespace linked_list;

use Exception;
use stack\Stack;

require_once __DIR__ . '/../stack/Stack.php';
require_once 'LinkedListTwo.php';

/**
 * 使用链表实现栈
 * Class LinkedListStack
 * @package linked_list
 */
class LinkedListStack implements Stack
{

    /**
     * @var LinkedListTwo
     */
    private LinkedListTwo $linkedListTwo;

    /**
     * LinkedListStack constructor.
     */
    public function __construct()
    {
        $this->linkedListTwo = new LinkedListTwo();
    }


    /**
     * 压栈
     * @param $element
     * @throws Exception
     */
    public function push($element)
    {
        $this->linkedListTwo->addFront($element);
    }

    /**
     * 出栈
     */
    public function pop()
    {
        return $this->linkedListTwo->deleteFrontData();
    }

    /**
     * 查看栈顶元素
     */
    public function peek()
    {
       return $this->linkedListTwo->getFrontData();
    }

    /**
     * 返回栈是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->linkedListTwo->empty();
    }

    /**
     * 获取栈内元素个数
     * @return int
     */
    public function getSize(): int
    {
        return $this->linkedListTwo->getSize();
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return "top " . $this->linkedListTwo;
    }
}

$stack = new LinkedListStack();
$stack->push('a');
$stack->push('b');
$stack->push('c');
echo $stack;

echo $stack->pop() . PHP_EOL;

echo $stack->getSize() . PHP_EOL;

