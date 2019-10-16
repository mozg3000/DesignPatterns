<?php


namespace Service\Order;

use Service\Billing\Exception\BillingException;
use Service\Billing\Transfer\Card;
use  Service\Builder\IOrder;
use Service\Communication\Exception\CommunicationException;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class CheckOut
{

    private IOrder $orderer;

    public function __construct(IOrder $orderer)
    {
        $this->orderer = $orderer;
    }

    public function buildOrder(Basket $basket)
    {
        $this->orderer->setBilling(new Card());
        $this->orderer->setDiscount(new NullObject());
        $this->orderer->setCommunication(new Email());
        $this->orderer->setSecurity(new Security($basket->getSession()));
        $this->orderer->setBasket($basket);

        return $this->orderer->build();
    }
    public function process(IOrder $order)
    {
        $totalPrice = 0;
        foreach ($order->getBasket()->getProductsInfo() as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $order->getDiscount()->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        try {
            $order->getBilling()->pay($totalPrice);
        } catch (BillingException $e) {
        }

        $user = $order->getSecurity()->getUser();
        try {
            $order->getCommunication()->process($user, 'checkout_template');
        } catch (CommunicationException $e) {
        }
    }

    public function complete(Basket $basket):void
    {
        $this->process($this->buildOrder($basket));
    }
}