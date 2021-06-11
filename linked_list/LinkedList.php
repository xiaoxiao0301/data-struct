<?php


namespace linked_list;

use Exception;

require_once 'Node.php';

/**
 * 链表
 * Class LinkedList
 * @package linked_list
 */
class LinkedList
{
    /**
     * 虚拟头结点，指向链表头结点的前一个节点
     * @var Node
     */
    private Node $dummyNode;

    /**
     * @var int
     */
    private $size;

    /**
     * LinkedList constructor.
     */
    public function __construct()
    {
        $this->dummyNode = new Node(null, null);
        $this->size = 0;
    }


    /**
     * 给定位置插入元素
     * @throws Exception
     */
    public function addIndexElement($index, $item)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("插入链表位置非法");
        }
        // 需要找到要插入位置的前一个节点
        $prev = $this->dummyNode;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }
        $node = new Node($item, null);
        $node->next = $prev->next;
        $prev->next = $node;

        $this->size++;

    }

    /**
     * 链表头部插入元素
     * @param $item
     * @throws Exception
     */
    public function addFirstElement($item)
    {
        $this->addIndexElement(0, $item);
    }

    /**
     * 链表尾部插入元素
     * @param $item
     * @throws Exception
     */
    public function addLastElement($item)
    {
        $this->addIndexElement($this->size, $item);
    }

    /**
     * 获取给定位置的元素
     * @param $index
     * @return mixed
     * @throws Exception
     */
    public function getIndexElement($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new Exception("查找位置非法");
        }

        $current = $this->dummyNode->next;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }
        return $current->data;

    }

    /**
     * 获取链表头部的元素
     * @throws Exception
     */
    public function getFirstElement()
    {
        return $this->getIndexElement(0);
    }

    /**
     * 获取链表尾部的元素
     * @throws Exception
     */
    public function getLastElement()
    {
        return $this->getIndexElement($this->size - 1);
    }


    /**
     * 更新给定位置的元素
     * @param $index
     * @param $item
     * @throws Exception
     */
    public function updateIndexElement($index, $item)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new Exception("更新位置非法");
        }
        $current = $this->dummyNode->next;
        for ($i = 0; $i < $index; $i++) {
            $current = $current->next;
        }
        $current->data = $item;
    }

    /**
     * 判断链表是否包含某个元素
     * @param $item
     * @return bool
     */
    public function containsElement($item): bool
    {
        $current = $this->dummyNode->next;
        while (!is_null($current)) {
            if ($current->data == $item) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    /**
     * 删除链表给定位置元素
     * @param $index
     * @throws Exception
     * @return int
     */
    public function deleteIndexElement($index): int
    {
        if ($index < 0 || $index >= $this->size) {
            throw new Exception("更新位置非法");
        }
        $prev = $this->dummyNode;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        // 这个是要删除的元素
        /** @var Node $deleteNode */
        $deleteNode = $prev->next;
        $prev->next = $deleteNode->next;
        $deleteNode->next = null;
        $this->size--;
        return $deleteNode->data;
    }

    /**
     * 删除链表头部元素
     * @return int
     * @throws Exception
     */
    public function deleteFirstElement(): int
    {
        return $this->deleteIndexElement(0);
    }

    /**
     * 删除链表尾部元素
     * @return int
     * @throws Exception
     */
    public function deleteLastElement(): int
    {
        return $this->deleteIndexElement($this->size - 1);
    }

    /**
     * 链表个数
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 链表是否为空
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size == 0;
    }


    public function __toString(): string
    {
        $current = $this->dummyNode->next;
        $result = "";
        /** @var Node $current */
        while (!is_null($current)) {
            $result .= $current->data . "->";
            $current = $current->next;
        }
        $result .= "NULL";
        return $result;
    }
}

$list1 = new LinkedList();

for ($i = 0; $i < 5; $i++) {
    try {
        $list1->addFirstElement($i);
        echo $list1 . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

$list1->addIndexElement(2, 66);
echo $list1 . PHP_EOL;

echo $list1->getFirstElement() . PHP_EOL;
echo $list1->getLastElement() . PHP_EOL;
echo $list1->getIndexElement(3) . PHP_EOL;

$list1->updateIndexElement(3, 42);
echo $list1 . PHP_EOL;

echo $list1->getSize() . PHP_EOL;

echo $list1->deleteIndexElement(0) . PHP_EOL;
echo $list1 . PHP_EOL;