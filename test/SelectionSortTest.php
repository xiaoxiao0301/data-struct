<?php

require_once  __DIR__ . '/../common/ArrayGenerator.php';
require_once  __DIR__ . '/../common/SortingHelper.php';
require_once  __DIR__ . '/../selection_sort/SelectionSort.php';

use PHPUnit\Framework\TestCase;

class SelectionSortTest extends TestCase
{

    /**
     * phpunit --filter testSort SelectionSortTest.php
     */
    public function testSort()
    {
        $testArr = ArrayGenerator::generateRandomArray(10, 1000);
        echo PHP_EOL;
        if (SortingHelper::isSorted(SelectionSort::sort($testArr))) {
            echo "排序正确" . PHP_EOL;
        } else {
            echo "排序错误" . PHP_EOL;
        }
       $this->assertEquals($this->currentSortArray($testArr), SelectionSort::sort($testArr), "算法错误");
    }

    /**
     * phpunit --filter testSortTime SelectionSortTest.php
     */
    public function testSortTime()
    {
        $n = 1000;
        $testArr = ArrayGenerator::generateRandomArray($n, $n);
        $startTime = microtime(true);
        $sortArr = SelectionSort::sort($testArr);
        $endTime = microtime(true);
        $time = $endTime - $startTime;
        $this->assertEquals($this->currentSortArray($testArr), $sortArr);
        if (SortingHelper::isSorted($sortArr)) {
            echo "排序正确" . PHP_EOL;
        } else {
            echo "排序错误" . PHP_EOL;
        }
        echo "SelectionSort, n= $n: $time";

    }


    /**
     * 调用系统内置的sort方法来检验实现的排序是否正确
     * @param array $arr
     * @return array
     */
    private function currentSortArray(array $arr): array
    {
        sort($arr);
        return $arr;
    }
}
