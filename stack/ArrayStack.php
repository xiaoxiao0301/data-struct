<?php

namespace stack;

use Exception;

require_once 'ArrayClass.php';
require_once 'Stack.php';

/**
 * 这里实现栈基于上一次实现的数组类，并且将栈顶设置为数组的末尾，栈底是数组的开始
 * 栈只能从一端插入和读取,这里设定从数组的末尾开始
 * Class ArrayStack
 * @package stack
 */
class ArrayStack implements Stack
{
    /**
     * @var ArrayClass
     */
    private ArrayClass $arrayClass;

    public function __construct()
    {
        $this->arrayClass = new ArrayClass();
    }

    /**
     * 往栈添加元素
     * @param $element
     * @throws Exception
     */
    public function push($element)
    {
        $this->arrayClass->addLastElement($element);
    }

    /**
     * 取出栈中的元素
     * @throws Exception
     */
    public function pop()
    {
        return $this->arrayClass->removeLastElement();
    }

    /**
     * 获取栈顶的元素
     * @throws Exception
     */
    public function peek()
    {
        return $this->arrayClass->getLastElement();
    }

    /**
     * 判断栈内是否是空栈
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->arrayClass->isEmpty();
    }

    /**
     * 获取栈的大小
     * @return int
     */
    public function getSize(): int
    {
        return $this->arrayClass->getSize();
    }

    /**
     * @return string
     * @throws Exception
     */
    public function __toString()
    {
        $size = $this->arrayClass->getSize();
        $result = "stack data: [";
        for ($i = 0; $i < $this->arrayClass->getSize(); $i++) {
            $result .= $this->arrayClass->getIndexElement($i);
            if ($i != $size - 1) {
                $result .= ", ";
            }
        }
        $result .= ']top';
        return $result;
    }
}