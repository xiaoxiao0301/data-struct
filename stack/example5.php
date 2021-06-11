<?php


use stack\ArrayStack;

require_once 'ArrayStack.php';

$stack = new ArrayStack();

/**
 * 计算后缀表达式值
 * @param $expr
 * @param ArrayStack $exprStack
 * @return int
 * @throws Exception
 */
function getExprResult($expr, ArrayStack $exprStack): int
{
    $exprFormat = str_split($expr);
    foreach ($exprFormat as $item) {
        if (preg_match("/\d/", $item)) {
            // 操作数存放栈中，先取出来的是右操作数
            $exprStack->push($item);
        } else {
            // 取出第一个操作数，是右操作数
            $rightNumber = $exprStack->pop();
            // 取出第二个操作数，是左操作数
            $leftNumber = $exprStack->pop();
            $result = doMath((int)$leftNumber, (int)$rightNumber, $item);
            $exprStack->push($result);
        }
    }
    return $exprStack->pop();
}

/**
 * @param $left
 * @param $right
 * @param $operation
 * @return int
 */
function doMath($left, $right, $operation)
{
    $result = 0;

    switch ($operation) {
        case "+":
            $result = $left + $right;
            break;
        case "-":
            $result = $left - $right;
            break;
        case "*":
            $result = $left * $right;
            break;
        case "/":
            $result = $left / $right;
            break;
    }

    return $result;
}
// 后缀表达式求值
$expr = "145*+9+";
var_dump(getExprResult($expr, $stack));

