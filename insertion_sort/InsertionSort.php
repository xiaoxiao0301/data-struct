<?php

/**
 * 插入排序
 * Class InsertionSort
 */
class InsertionSort
{

    /**
     * InsertionSort constructor.
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
        for ($i = 1; $i < $length; $i++) {
            // 刚开始时第一个位置的元素默认是已经排好序的，从第二个位置开始
           for ($j = $i; $j > 0; $j--) {
               // 当前位置和前一个位置的值进行比较，前面的大就交换位置
               if ($arr[$j - 1] > $arr[$j]) {
                   self::swap($arr, $j - 1, $j);
               }
           }
        }

        return $arr;
    }

    /**
     * @param array $arr
     * @return array
     */
    public static function sort2(array $arr): array
    {
        $length = count($arr);
        for ($i = 1; $i < $length; $i++) {
            for ($j = $i; $j > 0 && $arr[$j - 1] > $arr[$j]; $j--) {
                self::swap($arr, $j, $j -1);
            }
        }
        return $arr;
    }

    /**
     * @param array $arr
     * @return array
     */
    public static function sort3(array $arr): array
    {
        $length = count($arr);
        for ($i = 1; $i < $length; $i++) {
            // 取出当前位置的值赋值一个临时变量
            $temp = $arr[$i];
            for ($j = $i; $j > 0 && $arr[$j -1] > $temp; $j--) {
                // 当前位置元素的值大于需要排序的值时，需要将大的值赋值给当前位置，继续查找直到小于排序的值
                $arr[$j] = $arr[$j - 1]; // 此时，当前的位置还不是真正插入的位置
            }
            $arr[$j] = $temp;
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