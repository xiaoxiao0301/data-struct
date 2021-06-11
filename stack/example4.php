<?php


use stack\ArrayStack;

require_once 'ArrayStack.php';

$stack = new ArrayStack();

/**
 * 表达式转换，将中缀表达式（a*b+2）转换成后缀表达式(ab*2+)
 * @param string $expr 需要转换的中缀表达式
 * @param ArrayStack $exprStack
 * @return string
 * @throws Exception
 */
function changeExpr(string $expr, ArrayStack $exprStack): string
{
    // 运算符优先级
    $exprLevel = ["*" => 3, "/" => 3, "+" => 2, "-" => 2, ")" => 1, "(" => 1];

    $formatExpr = str_split($expr);
    // 存储操作数
    $numberList = [];
    // 存储操作符
    foreach ($formatExpr as $item) {
        if (preg_match("/\d/", $item)  || preg_match("/\w/", $item)) {
            $numberList[] = $item;
        } elseif ($item == "(") {
            $exprStack->push($item);
        } elseif ($item == ")") {
            $topItem = $exprStack->pop();
            while ($topItem != "(") {
                $numberList[] = $topItem;
                $topItem = $exprStack->pop();
            }
        } else {
            // 比较栈顶的运算符与当前的运算符的优先级
            while (!$exprStack->isEmpty() && $exprLevel[$exprStack->peek()] >= $exprLevel[$item]) {
                $numberList[] = $exprStack->pop();
            }
            $exprStack->push($item);
        }
    }

    while (!$exprStack->isEmpty()) {
        $numberList[] = $exprStack->pop();
    }

    return join("", $numberList);
}
$expr = "(a+b)/(c+d)";
echo $expr .PHP_EOL;
echo changeExpr($expr, $stack);

