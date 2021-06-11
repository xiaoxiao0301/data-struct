<?php


namespace linked_list;

use Exception;

require_once 'Node.php';

/**
 * Class LinkedListTwo
 * @package linked_list
 */
class LinkedListTwo
{
    /**
     * 头结点，指向链表头部, 保留头节点信息
     * @var
     */
    private $head;

    /**
     * 链表元素个数
     * @var int $size
     */
    private int $size;

    /**
     * LinkedListTwo constructor.
     */
    public function __construct()
    {
        $this->head = null;
        $this->size = 0;
    }

    /**
     * 链表添加元素, 需要找到添加位置的前一个元素
     * @param $index
     * @param $item
     * @throws Exception
     */
    public function addItem($index, $item)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("链表插入位置异常");
        }
        switch ($index) {
            case 0:
                $this->addFront($item);
                break;
            case $this->size:
                $this->addRear($item);
                break;
            default:
                $prevNode = $this->head;
                $number = 0;
                while ($number < $index - 1 && !is_null($prevNode->next)) {
                    $prevNode = $prevNode->next;
                    $number++;
                }
                $node = new Node($item, null);
                $node->next = $prevNode->next;
                $prevNode->next = $node;
                $this->size++;
        }
    }

    /**
     * 链表头部添加元素
     * @param $item
     * @throws Exception
     */
    public function addFront($item)
    {
        $node = new Node($item, null);
        $node->next = $this->head;
        $this->head = $node;
        $this->size++;
    }

    /**
     * 链表尾部添加元素
     * @param $item
     * @throws Exception
     */
    public function addRear($item)
    {
        $prevNode = $this->head;
        while (!is_null($prevNode->next)) {
            $prevNode = $prevNode->next;
        }
        $node = new Node($item, null);
        $prevNode->next = $node;
        $this->size++;
    }


    /**
     * @param $index
     * @throws Exception
     * @return int
     */
    public function getItem($index): int
    {
        if ($index < 0 || $index >= $this->size) {
            throw new Exception("获取链表位置异常");
        }
        switch ($index) {
            case 0:
                $result = $this->getFrontData();
                break;
            case $this->size - 1:
                $result = $this->getRearData();
                break;
            default:
                $current = $this->head;
                $number = 0;
                while ($number < $index && !is_null($current->next)) {
                    $current = $current->next;
                    $number++;
                }
                $result = $current->data;
        }
        return $result;
    }

    /**
     * 获取链表头部数据
     */
    public function getFrontData()
    {
        return $this->head->data;
    }

    /**
     * 获取链表尾部数据
     */
    public function getRearData()
    {
        $current = $this->head;
        while (!is_null($current->next)) {
            $current = $current->next;
        }
        return $current->data;
    }

    /**
     * 更新链表指定位置的元素
     * @param $index
     * @param $item
     * @throws Exception
     */
    public function updateItem($index, $item)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("链表插入位置异常");
        }
        $current = $this->head;
        $number = 0;
        while ($number < $index && !is_null($current->next)) {
            $current = $current->next;
            $number++;
        }
        $current->data = $item;
    }


    /**
     * 链表查找元素
     * @param $item
     * @return bool
     */
    public function search($item): bool
    {
        $current = $this->head;
        while (!is_null($current)) {
            if ($current->data == $item) {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    /**
     * 删除指定链表位置的元素
     * @param $index
     * @throws Exception
     */
    public function deleteItem($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw new Exception("链表删除位置异常");
        }
        switch ($index) {
            case 0:
                $result = $this->deleteFrontData();
                break;
            case $this->size - 1:
                $result = $this->deleteRearData();
                break;
            default:
                $prevNode = $this->head;
                $number = 0;
                while ($number < $index - 1 && !is_null($prevNode->next)) {
                    $prevNode = $prevNode->next;
                }
                $deleteNode = $prevNode->next;
                $prevNode->next = $deleteNode->next;
                $deleteNode->next = null;
                $this->size--;
                $result = $deleteNode->data;
        }
        return $result;
    }

    /**
     * 删除链表头部元素并返回
     */
    public function deleteFrontData()
    {
        $deleteNode = $this->head;
        $deleteData = $deleteNode->data;
        $this->head = $deleteNode->next;
        $deleteNode->next = null;
        $this->size--;
        return $deleteData;

    }

    /**
     * 删除链表尾部元素并返回
     */
    public function deleteRearData()
    {
        $prevNode = $this->head;
        $length = $this->size;
        while ($length > 2) {
            $length--;
            $prevNode = $prevNode->next;
        }
        $deleteNode = $prevNode->next;
        $deleteData = $deleteNode->data;
        $prevNode->next = null;
        $this->size--;
        return $deleteData;
    }


    /**
     * 获取链表元素个数
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 返回链表是否为空
     * @return bool
     */
    public function empty(): bool
    {
        return $this->size == 0;
    }


    /**
     * 格式化输出链表元素
     */
    public function __toString(): string
    {
        $current = $this->head;
        $result = "";
        while (!is_null($current)) {
            $result .= $current->data . "->";
            $current = $current->next;
        }
        $result .= "NULL";
        return $result . PHP_EOL;
    }

}

$list2 = new LinkedListTwo();
var_dump($list2->empty());
$list2->addFront(12);
$list2->addFront(22);
echo $list2;
echo $list2->getSize() . PHP_EOL;

$list2->addRear(32);
$list2->addRear(42);
$list2->addRear(52);
$list2->addItem(1,102);
echo $list2;

echo $list2->getFrontData() . PHP_EOL;
echo $list2->getRearData() . PHP_EOL;
echo $list2->getItem(1) . PHP_EOL;
echo $list2->getItem(0) . PHP_EOL;
echo $list2->getSize() . PHP_EOL;

$list2->addItem(6, 77);
echo $list2;

$list2->updateItem(1, 1000);
echo $list2;
$list2->updateItem(0, 10000);
echo $list2;

var_dump($list2->search('a'));
var_dump($list2->search(1));
echo $list2->getSize() . PHP_EOL;
echo $list2;

echo $list2->deleteFrontData() . PHP_EOL;
echo $list2;
echo $list2->getSize() . PHP_EOL;

echo $list2->deleteRearData() . PHP_EOL;
echo $list2;
echo $list2->getSize() . PHP_EOL;

$list2->addFront(132);
$list2->addFront(142);
echo $list2;
echo $list2->getSize() . PHP_EOL;

echo $list2->deleteItem(1) . PHP_EOL;
echo $list2;
echo $list2->getSize() . PHP_EOL;

echo $list2->deleteItem(0) . PHP_EOL;
echo $list2;
echo $list2->getSize() . PHP_EOL;

echo $list2->deleteItem(4) . PHP_EOL;
echo $list2;
echo $list2->getSize() . PHP_EOL;