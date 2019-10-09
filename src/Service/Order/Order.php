<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Billing\Transfer\Card;
use Service\Communication\CommunicationInterface;
use Service\Communication\Sender\Email;
use Service\Discount\DiscountInterface;
use Service\User\Security;

class Order
{
    private $basket;
    private $billing;
    private $discount;
    private $communication;
    private $security;

    /**
     * Order constructor.
     * @param Basket $basket
     * @param BillingInterface $billing
     * @param DiscountInterface $discount
     * @param CommunicationInterface $communication
     * @param Security $security
     */
    public function __construct(
        Basket $basket,
        BillingInterface $billing,
        DiscountInterface $discount,
        CommunicationInterface $communication,
        Security $security
    )
    {
        $this->basket = $basket;
        $this->billing = $billing;
        $this->discount = $discount;
        $this->communication = $communication;
        $this->security = $security;
    }

    /**
     * @return Basket
     */
    public function getBasket(): Basket
    {
        return $this->basket;
    }

    /**
     * @return Card
     */
    public function getBilling(): BillingInterface
    {
        return $this->billing;
    }

    /**
     * @return DiscountInterface
     */
    public function getDiscount(): DiscountInterface
    {
        return $this->discount;
    }

    /**
     * @return CommunicationInterface
     */
    public function getCommunication(): CommunicationInterface
    {
        return $this->communication;
    }

    /**
     * @return Security
     */
    public function getSecurity(): Security
    {
        return $this->security;
    }
}