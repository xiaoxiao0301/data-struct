<?php

/**
 * Class SortingHelper
 */
class SortingHelper
{
    public function __construct()
    {

    }

    /**
     * 判断数组是否有序，升序，满足前面的元素必须小于后面的元素
     * @param array $arr
     * @return bool
     */
    public static function isSorted(array $arr): bool
    {
        for ($i = 1; $i < count($arr); $i++) {
            if ($arr[$i - 1] > $arr[$i]) {
                return false;
            }
        }
        return true;
    }

    /**
     * 测试排序方法性能
     * @param string $sortName
     * @param array $arr
     */
    public static function sortTest(string $sortName, array $arr)
    {
        try {
            require_once $sortName . ".php";
            $sortReflect = new ReflectionClass($sortName);
            $sortReflect->newInstance()::sort($arr);
//            $sortName::sort($arr);
        } catch (ReflectionException $exception) {
            echo $sortName . "类反射化失败,msg:" . $exception->getMessage() . PHP_EOL;
        }
    }

}