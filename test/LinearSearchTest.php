<?php

ini_set('memory_limit','800M');

require_once __DIR__ . '/../linear_search/LinearSearch.php';
require_once  __DIR__ . '/../linear_search/Student.php';
require_once  __DIR__ . '/../common/ArrayGenerator.php';

use PHPUnit\Framework\TestCase;

/**
 * Class LinearSearchTest
 */
class LinearSearchTest extends TestCase
{

    /**
     * phpunit --filter testIntSearch LinearSearchTest.php
     */
    public function testIntSearch()
    {
        $data = [24, 18, 12, 9, 16, 66, 32, 4];
        $this->assertNotSame(-1, LinearSearch::search($data, 16), "断言出错返回的提示信息");
        $this->assertSame(-1, LinearSearch::search($data, 2));
        $this->assertTrue(boolval(LinearSearch::search($data, 16)));
        $this->assertEquals(-1, LinearSearch::search($data, 2));

    }

    /**
     * phpunit --filter testStringSearch LinearSearchTest.php
     */
    public function testStringSearch()
    {
        $data = ['a', 'b', 'c', 'd', 'e', '哈哈'];
        $this->assertNotSame(-1, LinearSearch::search($data, 'b'));
        $this->assertNotSame(-1, LinearSearch::search($data, '哈哈'));
        $this->assertSame(-1, LinearSearch::search($data, '呵呵'));
    }

    /**
     * phpunit --filter testObjSearch LinearSearchTest.php
     */
    public function testObjSearch()
    {
        $data = [
            new Student('Alice'),
            new Student('Tom'),
            new Student('Jack'),
        ];
        $target = new Student('Tom');
        $this->assertNotSame(-1, LinearSearch::search($data, $target));
        $this->assertNotSame(-1, LinearSearch::search($data, new Student('xiaoLi')), "没有找到哦");
    }

    /**
     * phpunit --filter testGenerateArray LinearSearchTest.php
     */
    public function testGenerateArray()
    {
        // 性能测试，还可以添加for循环执行多次
        $target = 10000000;
        $data = ArrayGenerator::generateOrderedArray($target);
        $this->assertSame(-1, LinearSearch::search($data, $target));
    }
}
