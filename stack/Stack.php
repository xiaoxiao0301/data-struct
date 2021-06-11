<?php


namespace stack;

/**
 * Interface Stack
 * @package stack
 */
interface Stack
{
    public function push($element);
    public function pop();
    public function peek();
    public function isEmpty();
    public function getSize();
}