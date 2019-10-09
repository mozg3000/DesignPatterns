<?php


namespace Service\Builder;


use Service\Billing\BillingInterface;
use Service\Billing\Transfer\Card;
use Service\Communication\CommunicationInterface;
use Service\Communication\Sender\Email;
use Service\Discount\DiscountInterface;
use Service\Discount\NullObject;
use Service\Order\Basket;
use Service\Order\Order;
use Service\User\Security;

class OrderBuilder implements IOrder
{
    private $basket;
    private $billing;
    private $discount;
    private $communication;
    private $security;

    /**
     * @return mixed
     */
    public function getBilling():BillingInterface
    {
        return $this->billing;
    }

    /**
     * @param Card $billing
     * @return self
     *
     */
    public function setBilling(BillingInterface $billing): IOrder
    {
        $this->billing = $billing;
    }

    /**
     * @return NullObject
     */
    public function getDiscount():DiscountInterface
    {
        return $this->discount;
    }

    /**
     * @param DiscountInterface $discount
     * @return self
     */
    public function setDiscount(DiscountInterface $discount): IOrder
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return Email
     */
    public function getCommunication():CommunicationInterface
    {
        return $this->communication;
    }

    /**
     * @param Email $email
     * @return self
     */
    public function setCommunication(CommunicationInterface $communication): IOrder
    {
        $this->communication = $communication;

        return $this;
    }

    /**
     * @return Security
     */
    public function getSecurity():Security
    {
        return $this->security;
    }

    /**
     * @param Security $security
     * @return self
     */
    public function setSecurity(Security $security): IOrder
    {
        $this->security = $security;

        return $this;
    }

    public function build():Order
    {
        return (new Order(
            $this->getBasket(),
            $this->getBilling(),
            $this->getDiscount(),
            $this->getCommunication(),
            $this->getSecurity()
        ));
    }

    public function getBasket(): Basket
    {
        return $this->basket;
    }

    public function setBasket(Basket $basket): IOrder
    {
        $this->basket = $basket;
    }
}