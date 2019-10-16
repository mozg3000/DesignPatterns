<?php


namespace Service\Product;


class ProductPriceComparator implements ComparatorInterface
{
    const EPSILON = 0.01;
    /**
     * @param float $a
     * @param float $b
     * @return int
     */

    public function compare($a, $b): int
    {
        return abs($a - $b) < self::EPSILON ? 0 :  $a - $b < 0 ? -1 : 1;
    }
}