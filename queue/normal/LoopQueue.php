<?php

namespace queue\normal;

use Exception;

require_once 'Queue.php';

/**
 * 循环队列，数组队列每次出队列的时间复杂度都是O(n)，这个会浪费一个空间为了避免判断队列为空和队列为满的条件冲突
 * 浪费一个位置是指：循环数组中任何时刻一定至少有一个位置不存放有效元素
 * front = rear 队列为空
 * (rear + 1) % capacity == front 队列满了，可以理解为 rear 和 front之间相差一格，此时队列满了
 * Class LoopQueue
 * @package queue\normal
 */
class LoopQueue implements Queue
{
    /**
     * 存放队列的元素
     * @var array
     */
    private array $data;

    /**
     * 队列的长度
     * @var int
     */
    private int $size;

    /**
     * 指向队列头部第1个有效数据的位置
     * @var int
     */
    private int $front;

    /**
     * 指向队列尾部(最后1个有效数据)的下一个位置，也就是下一个从队尾入队元素的位置
     * @var int
     */
    private int $rear;

    /**
     * LoopQueue constructor.
     * @param $size
     */
    public function __construct($size)
    {
        $this->data = [];
        $this->size = $size + 1;
        $this->front = 0;
        $this->rear = 0;
    }


    /**
     * @throws Exception
     */
    public function enqueue($item)
    {
        if ($this->isFull()) {
            throw new Exception("队列满了");
        }
        // rear是指向队尾下一个有效位置，需要先赋值
        $this->data[$this->rear] = $item;
        $this->rear = ($this->rear + 1) % $this->size;
    }

    /**
     * @throws Exception
     */
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new Exception("队列为空");
        }
        $result = $this->data[$this->front];
        unset($this->data[$this->front]);
        $this->front = ($this->front + 1) % $this->size;
        return $result;
    }

    /**
     * 获取队首元素
     * @throws Exception
     */
    public function getFrontData()
    {
        if ($this->isEmpty()) {
            throw new Exception("队列为空");
        }
        return $this->data[$this->front];
    }

    /**
     * 获取队尾元素
     * @throws Exception
     */
    public function getRearData()
    {
        if ($this->isEmpty()) {
            throw new Exception("队列为空");
        }
        return $this->data[($this->rear - 1 + $this->size) % $this->size];
    }

    /**
     * 相等表示队列为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->front == $this->rear;
    }

    /**
     * 判断队列是否满了
     * @return bool
     */
    public function isFull(): bool
    {
        return ($this->rear + 1) % $this->size == $this->front;
    }

    /**
     * 获取队列个数
     * @return int
     */
    public function size(): int
    {
        return count($this->data);
    }

    /**
     * @return int
     */
    public function getFront(): int
    {
        return $this->front;
    }

    /**
     * @return int
     */
    public function getRear(): int
    {
        return $this->rear;
    }

    /**
     * 获取队列长度
     * @return int
     */
    public function getLength(): int
    {
        return $this->size - 1;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $result = sprintf("Loop Queue: size = %d, length = %d\n", $this->size(), $this->getLength()) . "front [";
        for ($i = $this->front; $i != $this->rear; $i = ($i + 1)%($this->size)) {
            $result .= $this->data[$i];
            if (($i + 1)%($this->size) != $this->rear) {
                $result .= ", ";
            }
        }
        $result .= "] tail";
        return $result;
    }

}