<?php


namespace Service\Builder;


use Service\Billing\BillingInterface;
use Service\Billing\Transfer\Card;
use Service\Communication\CommunicationInterface;
use Service\Communication\Sender\Email;
use Service\Discount\DiscountInterface;
use Service\Discount\NullObject;
use Service\Order\Basket;
use Service\User\Security;

interface IOrder
{
    /**
     * @return Card
     */
    public function getBilling():BillingInterface;

    /**
     * @param BillingInterface $billing
     * @return self
     */
    public function setBilling(BillingInterface $billing): self;
    /**
     * @return NullObject
     */
    public function getDiscount():DiscountInterface;

    /**
     * @param DiscountInterface $discount
     * @return self
     */
    public function setDiscount(DiscountInterface $discount): self;

    /**
     * @return Email
     */
    public function getCommunication():CommunicationInterface;

    /**
     * @param Email $email
     * @return self
     */
    public function setCommunication(CommunicationInterface $email): self;

    /**
     * @return Security
     */
    public function getSecurity():Security;
    /**
     * @param Security $security
     * @return self
     */
    public function setSecurity(Security $security): self;

    public function getBasket():Basket;

    public function setBasket(Basket $basket):self;

    public function build();

}