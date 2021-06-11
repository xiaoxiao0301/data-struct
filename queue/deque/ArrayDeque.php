<?php


namespace queue\deque;

use Exception;

require_once 'ArrayClass.php';
require_once 'Dequeue.php';

class ArrayDeque implements Dequeue
{
    /**
     * @var ArrayClass
     */
    private ArrayClass $arrayClass;

    /**
     * Deque constructor.
     */
    public function __construct()
    {
        $this->arrayClass = new ArrayClass();
    }

    /**
     * @param $item
     * @throws Exception
     */
    public function addFront($item)
    {
        $this->arrayClass->addFirstElement($item);
    }

    /**
     * @param $item
     * @throws Exception
     */
    public function addRear($item)
    {
        $this->arrayClass->addLastElement($item);
    }

    /**
     * @throws Exception
     */
    public function removeFront()
    {
        return $this->arrayClass->removeFirstElement();
    }

    /**
     * @throws Exception
     */
    public function removeRear()
    {
        return $this->arrayClass->removeLastElement();
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return $this->arrayClass->isEmpty();
    }

    /**
     * @return int
     */
    public function size(): int
    {
        return $this->arrayClass->getSize();
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

    public function __toString(): string
    {
        $result = sprintf("Deque:size=%d\n", $this->size());
        $result .= " front [";
        for ($i = 0; $i < $this->size(); $i++) {
            $result .= $this->arrayClass->getIndexElement($i);
            if ($i != $this->size() - 1) {
                $result .= ", ";
            }
        }
        $result .= "] tail";
        return $result;
    }
}