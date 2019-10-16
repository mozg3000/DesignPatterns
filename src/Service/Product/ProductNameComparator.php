<?php


namespace Service\Product;


use Model\Entity\Product;

class ProductNameComparator implements ComparatorInterface
{

    /**
     * @param Product $a
     * @param Product $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return strcasecmp($a->getName(), $b->getName());
    }

    public function getMethodName(){

        return 'compare';
    }
}