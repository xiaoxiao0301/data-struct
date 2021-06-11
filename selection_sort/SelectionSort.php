<?php

/**
 * 选择排序
 * Class SelectionSort
 */
class SelectionSort
{

    /**
     * SelectionSort constructor.
     */
    private function __construct()
    {

    }

    /**
     * @param array $arr
     * @return array
     */
    public static function sort(array $arr): array
    {
        $length = count($arr);
        // arr[0..i)是有序的, arr[i...n)是无序的
        for ($i = 0; $i < $length; $i++) {
            // 选择 arr[i...n)中的最小值的索引
            $minIndex = $i;
            for ($j = $i; $j < $length; $j++) {
                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                }
            }
            self::swap($arr, $i, $minIndex);
        }

        return $arr;
    }

    /**
     * 交换数组中两个位置的元素
     * @param array $arr
     * @param int $i
     * @param int $j
     */
    public static function swap(array &$arr, int $i, int $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    /**
     * 打印数组
     * @param array $arr
     */
    public static function printArr(array $arr)
    {
        foreach ($arr as $item) {
            echo $item . "\t";
        }
        echo PHP_EOL;
    }
}