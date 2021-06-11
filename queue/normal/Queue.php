<?php


namespace queue\normal;

/**
 * Interface Queue
 * @package queue
 */
interface Queue
{
    /**
     * 队尾添加元素
     * @param $item
     */
    public function enqueue($item);

    /**
     * 从队首移除元素
     */
    public function dequeue();

    /**
     * 获取队首元素
     */
    public function getFront();

    /**
     * 返回队列是否为空
     */
    public function isEmpty();

    /**
     * 返回队列数据项个数
     */
    public function size();
}