<?php


namespace Service\Product;


interface ComparatorInterface
{
    const METHODNAME = 'compare';
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b):int;
}