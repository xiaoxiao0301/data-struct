<?php


namespace linked_list;

use Exception;
use queue\normal\Queue;

require_once __DIR__ . '/../queue/normal/Queue.php';
require_once 'Node.php';

/**
 * 使用链表实现队列，添加一个指向链表的尾部的指针，从链表尾部入队，从链表头部出队
 * Class LinkedListQueue
 * @package linked_list
 */
class LinkedListQueue implements Queue
{
    /**
     * 指向链表的头部
     * @var
     */
    private $head;
    /**
     * 指向链表的尾部
     * @var
     */
    private $tail;
    /**
     * @var
     */
    private $size;

    /**
     * LinkedListQueue constructor.
     */
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }


    /**
     * 入队，队尾
     * @param $item
     */
    public function enqueue($item)
    {
        $node = new Node($item, null);
        if ($this->tail == null) {
            // 空链表
            $this->head = $node;
            $this->tail = $node;
        } else {
            $this->tail->next = $node;
            $this->tail = $this->tail->next;
        }
        $this->size++;
    }

    /**
     * 出队, 队首
     * @throws Exception
     */
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new Exception("队列为空");
        }
        $deleteNode = $this->head;
        $deleteData = $deleteNode->data;
        $this->head = $deleteNode->next;
        $deleteNode->next = null;
        $this->size--;
        if ($this->head == null) {
            $this->tail = null;
        }
        return $deleteData;
    }

    /**
     * 获取队首元素
     */
    public function getFront()
    {
        return $this->head->data;
    }

    /**
     * 返回队列是否为空
     */
    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    /**
     * 获取队列元素个数
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $result = "Queue: front ";
        $current = $this->head;
        while (!is_null($current)) {
            $result .= $current->data . "->";
            $current = $current->next;
        }
        $result .= "NULL tail";
        return $result . PHP_EOL;
    }
}

$queue = new LinkedListQueue();
$queue->enqueue(3);
$queue->enqueue(10);
$queue->enqueue(30);
$queue->enqueue(20);
echo $queue;
echo $queue->size() . PHP_EOL;
echo $queue->getFront(). PHP_EOL;
echo $queue->dequeue() . PHP_EOL;
echo $queue;
echo $queue->size() . PHP_EOL;