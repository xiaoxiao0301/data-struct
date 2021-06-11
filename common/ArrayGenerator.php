<?php

/**
 * Class ArrayGenerator
 */
class ArrayGenerator
{
    private function __construct()
    {

    }

    /**
     * 生成有序数组
     * @param int $n
     * @return array
     */
    public static function generateOrderedArray(int $n): array
    {
        $data = [];
        for ($i = 0; $i < $n; $i++) {
            $data[$i] = $i;
        }
        return $data;
    }

    /**
     * 生成随机数组
     * @param int $n
     * @param int $maxNumber
     * @return array
     */
    public static function generateRandomArray(int $n, int $maxNumber): array
    {
        $data = [];
        for ($i = 0; $i < $n; $i++) {
            $data[$i] = mt_rand(0, $maxNumber);
        }
        return $data;
    }
}