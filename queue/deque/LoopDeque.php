<?php


namespace queue\deque;

use Exception;

require_once 'Dequeue.php';

class LoopDeque implements Dequeue
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
     * 需要先移动指向队列头部的指向再赋值
     * @param $item
     * @throws Exception
     */
    public function addFront($item)
    {
        if ($this->isFull()) {
            throw new Exception("队列满了");
        }
        $this->front = ($this->front - 1 + $this->size) % $this->size;
        $this->data[$this->front] = $item;
    }

    /**
     * 先赋值在移动指向队尾
     * @param $item
     * @throws Exception
     */
    public function addRear($item)
    {
        if ($this->isFull()) {
            throw new Exception("队列满了哈");
        }
        // rear是指向队尾下一个有效位置，需要先赋值
        $this->data[$this->rear] = $item;
        $this->rear = ($this->rear + 1) % $this->size;
    }

    /**
     *
     * @throws Exception
     */
    public function removeFront()
    {
        if ($this->isEmpty()) {
            throw new Exception("队列为空");
        }
        $item = $this->data[$this->front];
        $this->front = ($this->front + 1) % $this->size;
        unset($this->data[$this->front]);
        return $item;
    }

    /**
     *
     * @throws Exception
     */
    public function removeRear()
    {
        if ($this->isEmpty()) {
            throw new Exception("队列为空");
        }
        $item = $this->data[($this->rear -1 + $this->size) % $this->size];
        unset($this->data[($this->rear -1 + $this->size) % $this->size]);
        $this->rear = ($this->rear - 1 + $this->size) % $this->size;
        return $item;
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
     * 获取队列长度
     * @return int
     */
    public function getLength(): int
    {
        return $this->size - 1;
    }

    /**
     * 清空队列
     * @throws Exception
     */
    public function flashQueue()
    {
        while (!$this->isEmpty()) {
            $this->removeFront();
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $result = sprintf("Loop Dequeue: size = %d, length = %d\n", $this->size(), $this->getLength());
        $result .= "front [";
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