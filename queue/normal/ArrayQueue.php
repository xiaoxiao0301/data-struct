<?php


namespace queue\normal;

use Exception;

require_once 'ArrayClass.php';
require_once 'Queue.php';

class ArrayQueue implements Queue
{
    /**
     * @var ArrayClass
     */
    private ArrayClass $arrayClass;

    /**
     * ArrayQueue constructor.
     */
    public function __construct()
    {
        $this->arrayClass = new ArrayClass();
    }


    /**
     * @throws Exception
     */
    public function enqueue($item)
    {
        $this->arrayClass->addLastElement($item);
    }

    /**
     * @throws Exception
     */
    public function dequeue()
    {
        return $this->arrayClass->removeFirstElement();
    }

    /**
     * @throws Exception
     */
    public function getFront()
    {
        return $this->arrayClass->getFirstElement();
    }

    public function isEmpty()
    {
        return $this->arrayClass->isEmpty();
    }

    public function size()
    {
        return $this->arrayClass->getSize();
    }

    public function __toString(): string
    {
        $result = "Normal Queue: front [";
        for ($i = 0; $i < $this->arrayClass->getSize(); $i++) {
            $result .= $this->arrayClass->getIndexElement($i);
            if ($i != $this->arrayClass->getSize() - 1) {
                $result .= ", ";
            }
        }
        $result .= "]tail";
        return $result;
    }

}