<?php

namespace queue\deque;

/**
 * 双端队列
 * Interface Dequeue
 * @package queue\deque
 */
interface Dequeue
{
    /**
     * @param $item
     * 将item加入队首
     */
    public function addFront($item);

    /**
     * @param $item
     * 将item加入队尾
     */
    public function addRear($item);

    /**
     * 从队首移除数据项，返回移除的数据
     */
    public function removeFront();

    /**
     * 从队尾移除数据项，返回移除的数据
     */
    public function removeRear();

    /**
     * 返回队列是否为空
     */
    public function isEmpty();

    /**
     * 返回队列中的数据项个数
     */
    public function size();
}