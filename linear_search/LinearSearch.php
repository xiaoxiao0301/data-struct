<?php

/**
 * 线性查找
 * Class LinearSearch
 */
class LinearSearch
{
    /**
     * 私有构造函数防止使用new对象
     * LinearSearch constructor.
     */
    private function __construct()
    {

    }

    /**
     * 查找数组中的元素
     * @param array $data
     * @param mixed $target
     * @return int
     */
    public static function search(array $data, $target): int
    {
        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i] == $target) {
                return $i;
            }
        }
        return -1;
    }
}