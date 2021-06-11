<?php

ini_set('memory_limit','800M');

require_once  __DIR__ . '/../common/ArrayGenerator.php';
require_once  __DIR__ . '/../common/SortingHelper.php';
require_once  __DIR__ . '/../insertion_sort/InsertionSort.php';

use PHPUnit\Framework\TestCase;

class InsertionSortTest extends TestCase
{

    /**
     * phpunit --filter testSort InsertionSortTest.php
     */
    public function testSort()
    {
        $arrLength = [1000, 10000];
        echo PHP_EOL . "原始插入排序:............" . PHP_EOL;
        foreach ($arrLength as $length) {
            // 无序数组
            $randomArr = ArrayGenerator::generateRandomArray($length, $length);
            $this->calcTime($randomArr, $length, "sort");
        }
    }

    /**
     * phpunit --filter testSort2 InsertionSortTest.php
     */
    public function testSort2()
    {
        $arrLength = [1000, 10000];
        echo PHP_EOL . "优化内层for插入排序:............" . PHP_EOL;
        foreach ($arrLength as $length) {
            // 无序数组
            $randomArr = ArrayGenerator::generateRandomArray($length, $length);
            $this->calcTime($randomArr, $length, "sort2");
        }
    }

    /**
     * phpunit --filter testSort3 InsertionSortTest.php
     */
    public function testSort3()
    {
        $arrLength = [1000, 10000];
        echo PHP_EOL . "插入排序优化后:............" . PHP_EOL;
        foreach ($arrLength as $length) {
            // 无序数组
            $randomArr = ArrayGenerator::generateRandomArray($length, $length);
            $this->calcTime($randomArr, $length, "sort3");
        }
    }

    /**
     * @param array $arr
     * @param int $length
     * @param string $action
     */
    private function calcTime(array $arr, int $length, string $action)
    {
        $startTime = microtime(true);
        $sortArr = InsertionSort::$action($arr);
        $endTime = microtime(true);
        $time = $endTime - $startTime;
        $this->assertEquals($this->currentSortArray($arr), $sortArr);
        echo "InsertionSort::$action, n= $length: $time s" . PHP_EOL;
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
