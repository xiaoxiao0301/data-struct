<?php


namespace linked_list;

/**
 * 节点类
 * Class Node
 * @package linked_list
 */
class Node
{
    /**
     * @var
     */
    public $data = 0;

    /**
     * @var
     */
    public $next = null;

    /**
     * Node constructor.
     * @param $data
     * @param $next
     */
    public function __construct($data, $next)
    {
        $this->data = $data;
        $this->next = $next;
    }


}