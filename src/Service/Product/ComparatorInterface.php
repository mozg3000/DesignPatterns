<?php


namespace Service\Product;


interface ComparatorInterface
{
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b):int;
}