<?php


namespace linked_list;

require_once 'ListNode.php';

/**
 * Class Solution
 * @package linked_list
 */
class Solution
{
    /**
     * @param ListNode $head
     * @param int $val
     * @return ListNode|mixed|null
     */
    public function removeElements(ListNode $head, int $val)
    {
        // 删除链表头部,头部可能都是要删除的元素
        while (!is_null($head) && $head->val == $val) {
            $deleteNode = $head;
            $head = $head->next;
            $deleteNode->next = null;
        }
        if ($head == null) {
            return null;
        }

        // 删除中间的元素, head不会是要删除的结点，它的下一个结点可能是要删除的
        $prevNode = $head;
        while (!is_null($prevNode->next)) {
            if ($prevNode->next->val == $val) {
                $deleteNode = $prevNode->next;
                $prevNode->next = $deleteNode->next;
                $deleteNode->next = null;
            } else {
                $prevNode = $prevNode->next;
            }
        }
        return $head;
    }

    /**
     * @param ListNode $head
     * @param int $val
     * @return ListNode|mixed|null
     */
    public function removeElements2(ListNode $head, int $val)
    {
        // 使用虚拟头结点方式
        $dummyHead = new ListNode(null, null);
        $dummyHead->next = $head;
        $prevNode = $dummyHead;
        while (!is_null($prevNode->next)) {
            if ($prevNode->next->val == $val) {
                $prevNode->next = $prevNode->next->next;
            } else {
                $prevNode = $prevNode->next;
            }
        }
        return $dummyHead->next;
    }

    /**
     * @param ListNode $head
     * @param int $val
     */
    public function removeElements3(ListNode $head, int $val)
    {
        if ($head == null) {
            return null;
        }
//        // 分割成 head+其余已经删除要查找元素的链表
//        // 需要判断head是否是要删除的元素
//        if ($head->val == $val) {
//            return $this->removeElements3($head->next, $val);
//        } else {
//           $res = $this->removeElements3($head->next, $val);
//           $head->next = $res;
//           return $res;
//        }
        $head->next = $this->removeElements3($head->next,$val);
        return  $head->val == $val ? $head->next : $head;

    }


    public function tests1()
    {
        $data = [6, 5, 4, 3, 6, 2, 1];
        $node = new ListNode();
        $result = $this->removeElements($node->createListNode($data), 6);
        echo $node->printListNode($result);
    }

    public function test2()
    {
        $data = [6, 5, 4, 3, 6, 2, 1];
        $node = new ListNode();
        $result = $this->removeElements2($node->createListNode($data), 6);
        echo $node->printListNode($result);
    }
    public function test3()
    {
        $data = [6, 5, 4, 3, 6, 2, 1];
        $node = new ListNode();
        $result = $this->removeElements3($node->createListNode($data), 6);
        echo $node->printListNode($result);
    }
}


$s = new Solution();
$s->test2();
