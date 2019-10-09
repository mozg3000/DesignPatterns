<?php

declare(strict_types=1);

namespace Model\Entity;

use Model\Entity\User;
use Model\Repository\ProductRepository;

class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @param int $id
     * @param string $name
     * @param float $price
     */
    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
    public function __clone(){

        $this->id = -1;
        $this->name = "";
        $this->price = 0;
    }
    public function setId(int $id):void{

        $this->id = $id;

        return $this;
    }
    public function setName(string $name):void{

        $this->name = $name;

        return $this;
    }
    public function setPrice(float $price):void{

        $this->price = $price;

        return $this;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
}
