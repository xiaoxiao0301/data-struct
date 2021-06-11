<?php

/**
 *  进制转换， 十进制转换成其他进制比如 二，八，十六进制
 */

use stack\ArrayStack;

require_once 'ArrayStack.php';

$stack = new ArrayStack();


/**
 * 将给定的数字转换成特定的进制
 * @param $system
 * @param $number
 * @param ArrayStack $stack
 * @return string
 * @throws Exception
 */
function getExchangeNumber($system, $number, ArrayStack $stack): string
{
    $result = "";
    switch ($system) {
        case "2":
            $result = getBinaryNumberSystem($number, $stack);
            break;
        case "8":
            $result = getOctalNumberSystem($number, $stack);
            break;
        case "16":
            $result = getHexadecimalNumber($number, $stack);
            break;
    }

    return $result;
}

/**
 * @param $number
 * @param ArrayStack $stack
 * @return string
 * @throws Exception
 */
function getBinaryNumberSystem($number, ArrayStack $stack): string
{
    while ($number > 0) {
        $temp = $number % 2 ;
        $stack->push($temp);
        $number = (int)$number / 2;
    }
    $result = "";
    while (!$stack->isEmpty()) {
        $result .= $stack->pop();
    }
    return $result;
}

/**
 * @param $number
 * @param ArrayStack $stack
 * @return string
 * @throws Exception
 */
function getOctalNumberSystem($number, ArrayStack $stack): string
{
    while ($number > 0) {
        $temp = $number % 8 ;
        $stack->push($temp);
        $number = (int)$number / 8;
    }
    $result = "";
    while (!$stack->isEmpty()) {
        $result .= $stack->pop();
    }
    return $result;
}

/**
 * @param $number
 * @param ArrayStack $stack
 * @return string
 * @throws Exception
 */
function getHexadecimalNumber($number, ArrayStack $stack): string
{
    while ($number > 0) {
        $temp = $number % 16 ;
        $stack->push($temp);
        $number = (int)$number / 16;
    }
    $result = "";
    while (!$stack->isEmpty()) {
        $result .= $stack->pop();
    }
    return $result;
}

/**
 * @param $number
 * @param $base
 * @param ArrayStack $stack
 * @return string
 * @throws Exception
 */
function getBaseConvertNumber($number, $base, ArrayStack $stack): string
{
    $digits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F"];
    while ($number > 0) {
        $mode = $number % $base;
        $stack->push($mode);
        $number = (int)($number / $base);
    }

    $result = "";
    while (!$stack->isEmpty()) {
        $result .= $digits[$stack->pop()];
    }
    return $result;
}


$number = 128;

try {
    echo "十进制8转换二进制数是:" . getExchangeNumber("2", $number, $stack) . PHP_EOL;
    echo "十进制8转换八进制数是:" . getExchangeNumber("8", $number, $stack) . PHP_EOL;
    echo "十进制8转换十六进制数是:" . getExchangeNumber("16", $number, $stack) . PHP_EOL;
    echo "十进制128转换二进制数是:" . getBaseConvertNumber($number, 2, $stack) . PHP_EOL;
    echo "十进制128转换八进制数是:" . getBaseConvertNumber($number, 8, $stack) . PHP_EOL;
    echo "十进制128转换十六进制数是:" . getBaseConvertNumber($number, 16, $stack) . PHP_EOL;
} catch (Exception $e) {
    echo "err:" . $e->getMessage();
}
