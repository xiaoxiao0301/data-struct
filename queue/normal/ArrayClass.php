<?php

namespace queue\normal;


use Exception;

/**
 * Class ArrayClass
 * @package stack
 */
class ArrayClass
{
    /**
     * @var array
     */
    private array $data;
    /**
     * 数组大小
     * @var int
     */
    private int $size;

    /**
     * ArrayClass constructor.
     */
    public function __construct()
    {
        $this->data = [];
        $this->size = 0;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    /**
     * 向所有元素后添加一个新元素
     * @param $element
     * @throws Exception
     */
    public function addLastElement($element)
    {
        $this->addElement($this->size, $element);
    }

    /**
     * 在所有元素前添加一个元素
     * @param $element
     * @throws Exception
     */
    public function addFirstElement($element)
    {
        $this->addElement(0, $element);
    }

    /**
     * 在指定位置插入一个元素
     * @param int $index
     * @param $element
     * @throws Exception
     */
    public function addElement(int $index, $element)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("添加失败，索引位置错误");
        }

        for ($i = $this->size - 1; $i >= $index; $i--) {
            $this->data[$i + 1] = $this->data[$i];
        }
        $this->data[$index] = $element;
        $this->size++;
    }

    /**
     * 获取第一个元素
     * @return mixed
     * @throws Exception
     */
    public function getFirstElement()
    {
        return $this->getIndexElement(0);
    }

    /**
     * 获取数组最后一个元素
     * @throws Exception
     */
    public function getLastElement()
    {
        return $this->getIndexElement($this->size - 1);
    }

    /**
     * 获取索引位置的元素
     * @param int $index
     * @return mixed
     * @throws Exception
     */
    public function getIndexElement(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("索引位置错误");
        }
        return $this->data[$index];
    }

    /**
     * 更新索引位置的元素
     * @param int $index
     * @param $element
     * @throws Exception
     */
    public function setIndexElement(int $index, $element)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("索引位置错误");
        }
        $this->data[$index] = $element;
    }

    /**
     * 数组中是否包含元素
     * @param $element
     * @return bool
     */
    public function containsElement($element): bool
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $element) {
                return true;
            }
        }
        return false;
    }

    /**
     * 查找元素在数组中的位置，查找失败则返回-1
     * @param $element
     * @return int
     */
    public function findElement($element): int
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] == $element) {
                return $i;
            }
        }
        return -1;
    }

    /**
     * 从数组中删除第一个元素
     * @throws Exception
     */
    public function removeFirstElement()
    {
        return $this->removeIndexElement(0);
    }

    /**
     * 从数组中删除最后一个元素
     * @throws Exception
     */
    public function removeLastElement()
    {
        return $this->removeIndexElement($this->size - 1);
    }

    /**
     * 从数组中删除元素
     * @param $element
     * @throws Exception
     */
    public function removeElement($element)
    {
        $elementIndex = $this->findElement($element);
        if ($elementIndex != -1) {
            $this->removeIndexElement($elementIndex);
        }
    }


    /**
     * 删除指定位置上的元素并返回值
     * @param int $index
     * @return mixed
     * @throws Exception
     */
    public function removeIndexElement(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("索引位置错误");
        }
        $element = $this->data[$index];

        for ($i = $index + 1; $i < $this->size; $i++) {
            $this->data[$i - 1] = $this->data[$i];
        }
        $this->size--;

        return $element;
    }


    /**
     * echo $obj 时触发
     * @return string
     */
    public function __toString(): string
    {
        $result = sprintf("Array:size=%d", $this->size);
        $result .= ",data is [";
        for ($i = 0; $i < $this->size; $i++) {
            $result .= $this->data[$i];
            if ($i != $this->size - 1) {
                $result .= ", ";
            }
        }
        $result .= ']';
        return $result;

    }
}