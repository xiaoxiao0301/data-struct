<?php


namespace linked_list;

/**
 * Class ListNode
 * @package linked_list
 */
class ListNode
{
    public $val = 0;
    public $next = null;
    public function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }

    /**
     * @param $data
     * @return ListNode
     */
    public function createListNode($data): ListNode
    {
        $head = new ListNode($data[0]);
        for ($i = 1; $i < count($data); $i++) {
            $node = new ListNode($data[$i]);
            $node->next = $head;
            $head = $node;
        }
        return $head;
    }

    /**
     * @param ListNode $head
     * @return string
     */
    public function printListNode(ListNode $head): string
    {
        $current = $head;
        $result = "";
        while (!is_null($current)) {
            $result .= $current->val . "->";
            $current = $current->next;
        }
        $result .= "NULL";
        return $result . PHP_EOL;
    }
}

