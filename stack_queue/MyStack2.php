<?php

/**
 * 用队列实现栈， LeetCode地址： https://leetcode-cn.com/problems/implement-stack-using-queues/comments/
 * Class MyStack
 */
class MyStack2
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
    private array $queue;



    /**
     * MyStack constructor.
     */
    public function __construct()
    {
        $this->queue = [];
    }

    /**
     * 入栈， 默认数组尾部是栈顶
     * @param $item
     */
    public function push($item)
    {
        array_push($this->queue, $item);
        $length = count($this->queue);
        // 每次入队后，把之前队列中的元素挨个出队再入队
        while ($length > 1) {
            $temp = $this->pop();
            array_push($this->queue, $temp);
            $length--;
        }
    }

    /**
     * 删除并返回栈顶元素
     */
    public function pop()
    {
        return array_shift($this->queue);
    }

    /**
     * 返回栈顶元素不删除
     */
    public function top()
    {
        return current($this->queue);

    }

    /**
     * @return bool
     */
    public function empty(): bool
    {
        return empty($this->queue) == true;
    }

    public function __toString()
    {
        return join(',', $this->queue);
    }
}

$myStack2 = new MyStack2();
$myStack2->push(1);
$myStack2->push(2);
$myStack2->push(3);
$myStack2->push(4);

echo $myStack2 . PHP_EOL;
var_dump($myStack2->pop());
echo $myStack2 . PHP_EOL;
//
//var_dump($myStack->top());
//
//var_dump($myStack->empty());
//
//$myStack->pop();
//$myStack->pop();
//$myStack->pop();
//
//echo $myStack . PHP_EOL;
//
//var_dump($myStack->empty());
