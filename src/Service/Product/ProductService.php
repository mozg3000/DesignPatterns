<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;
use Model\Entity\Product;
use Model\Entity\Role;
use Model\Repository\ProductRepository;

class ProductService
{
    /**
     * Получаем информацию по конкретному продукту
     * @param int $id
     * @return Product|null
     */
    public function getInfo(int $id): ?Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     * @param string $sortType
     * @return Product[]
     */
    public function getAll(string $sortType): array
    {
        $productList = $this->getProductRepository()->fetchAll();

        // Применить паттерн Стратегия
        // $sortType === 'price'; // Сортировка по цене
        // $sortType === 'name'; // Сортировка по имени
        $sortType = $sortType ? : 'price';

        usort($productList, [$this->getComparator($sortType), ComparatorInterface::METHODNAME]);


        return $productList;
    }

    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }
    private function getComparator(string $sortType):ComparatorInterface{

        $comparator = null;

        switch(strtolower($sortType)){

            case 'price': {

                $comparator = new ProductPriceComparator();

                break;
            }
            case 'name': {

                $comparator = new ProductNameComparator();
                break;
            }
        }
        return $comparator;
    }
}
