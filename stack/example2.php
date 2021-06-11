<?php

/**
 *  括号匹配问题，左右括号匹配
 */

require_once 'ArrayStack.php';

$stack = new \stack\ArrayStack();

/**
 * @param string $str
 * @return bool
 * @throws Exception
 */
function validStr(string $str): bool
{
    $leftSymbolStr = ['(', '[', '{'];
    $rightSymbolStr = [')', ']', '}'];

    $stack = new \stack\ArrayStack();
    $flag = true;
    for ($i = 0; $i < strlen($str); $i++) {
        if (in_array($str[$i], $leftSymbolStr)) {
            $stack->push($str[$i]);
        } else if (in_array($str[$i], $rightSymbolStr)) {
            if ($stack->isEmpty()) {
                // 说明已经把左边的括号匹配完了，右括号多了
                $flag = false;
                break;
            } else {
                $leftElement = $stack->pop();
                if (!checkStrMatch($leftElement, $str[$i])) {
                    $flag = false;
                    break;
                }
            }
        } else {
            continue;
        }
    }

    if ($flag && $stack->isEmpty()) {
        echo "{$str} 匹配" . PHP_EOL;
        return true;
    } else {
        echo "{$str} 不匹配" . PHP_EOL;
        return false;
    }
}

/**
 * 利用数组下标判断是否相等
 * @param $leftStr
 * @param $rightStr
 * @return bool
 */
function checkStrMatch($leftStr, $rightStr): bool
{
    $leftSymbolStr = ['(', '[', '{'];
    $rightSymbolStr = [')', ']', '}'];
    if ($leftSymbolStr[$leftStr] == $rightSymbolStr[$rightStr]) {
        return true;
    } else {
        return false;
    }

}

$str = '()[]{}';
validStr($str);

$testStr2 = "(3*5)+(4+6)-(7-8)/)";
validStr($testStr2);

$testStr3 = "(3*5)+(4+6)-(7-8)";
validStr($testStr3);
