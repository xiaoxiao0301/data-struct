<?php

require_once 'ArrayDeque.php';
require_once 'LoopDeque.php';

use queue\deque\Dequeue;
use queue\deque\ArrayDeque;
use queue\deque\LoopDeque;

/**
 * 判断字符串是否是回文词
 * @param string $str
 * @param Dequeue $deque
 */
function checkIsHuiWen(string $str, Dequeue $deque)
{
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $deque->addRear(mb_substr($str, $i, 1));
    }

    $flag = true;
    // 此处大于1考虑是中间对称形式，多了一个最中间的数是例外
    while ($deque->size() > 1) {
        $front = $deque->removeFront();
        $rear = $deque->removeRear();
        if ($front != $rear) {
            $flag = false;
            break;
        }
    }

    if ($flag) {
        echo $str . " 是回文". PHP_EOL;
    } else {
        echo $str . " 不是回文" . PHP_EOL;
    }
}

$deque = new ArrayDeque();

$str = "海上自来水来自海上";
checkIsHuiWen($str, $deque);
$deque->flashQueue();
var_dump($deque->isEmpty());

$str2 = "上海自来水来自海上";
checkIsHuiWen($str2, $deque);
$deque->flashQueue();
var_dump($deque->isEmpty());

$str3 = "to2ot";
checkIsHuiWen($str3, $deque);
$deque->flashQueue();
var_dump($deque->isEmpty());

$loopDeque = new LoopDeque(100);
$str = "海上自来水来自海上";
checkIsHuiWen($str, $loopDeque);
$loopDeque->flashQueue();
var_dump($loopDeque->isEmpty());