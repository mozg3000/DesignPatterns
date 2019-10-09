<?php


namespace Service\Order;

use Service\Billing\Exception\BillingException;
use  Service\Builder\IOrder;
use Service\Communication\Exception\CommunicationException;

class CheckOut
{

    private IOrder $orderer;

    public function __construct(IOrder $orderer)
    {
        $this->orderer = $orderer;
    }

    public function process()
    {
        $totalPrice = 0;
        /**
         * @var Order $order
         */
        $order = $this->orderer->build();

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
}