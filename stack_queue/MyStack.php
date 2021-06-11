<?php

/**
 * 用队列实现栈， LeetCode地址： https://leetcode-cn.com/problems/implement-stack-using-queues/comments/
 * Class MyStack
 */
class MyStack
{
    /**
     * 仅使用两个队列实现一个后入先出（LIFO）的栈，并支持普通栈的全部四种操作（push、top、pop 和 empty）。
     * 实现 MyStack 类：
     * void push(int x) 将元素 x 压入栈顶。
     * int pop() 移除并返回栈顶元素。
     * int top() 返回栈顶元素。
     * boolean empty() 如果栈是空的，返回 true ；否则，返回 false 。
     *  deque（双端队列）来模拟一个队列 ,
     */

    /**
     * 第一个队列， 使用双端队列
     * @var array
     */
    private array $queue1;

    /**
     * 第二个队列，使用双端队列, 保存除了出栈的元素
     * @var array
     */
    private array $queue2;


    /**
     * MyStack constructor.
     */
    public function __construct()
    {
        $this->queue1 = [];
        $this->queue2 = [];
    }

    /**
     * 入栈， 默认数组尾部是栈顶
     * @param $item
     */
    public function push($item)
    {
        $this->queue1[] = $item;
    }

    /**
     * 删除并返回栈顶元素
     */
    public function pop()
    {
        $length = count($this->queue1);
        for ($i = 0; $i < $length - 1; $i++) {
            $this->queue2[] = $this->queue1[$i];
            unset($this->queue1[$i]);
        }
        $result = $this->queue1[$length - 1];
        unset($this->queue1[$length - 1]);
        $this->queue1 = $this->queue2;
        $this->queue2 = [];
        return $result;
    }

    /**
     * 返回栈顶元素不删除
     */
    public function top()
    {
        $result = $this->pop();
        $this->push($result);
        return $result;

    }

    /**
     * @return bool
     */
    public function empty(): bool
    {
        return empty($this->queue1) == true;
    }

    public function __toString()
    {
        return join(',', $this->queue1);
    }
}

$myStack = new MyStack();
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
