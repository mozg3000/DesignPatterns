<?php


namespace Controller\PageControllers\OrderPages;


use Framework\BaseController;
use Service\Billing\Exception\BillingException;
use Service\Communication\Exception\CommunicationException;
use Service\Order\Basket;
use Service\User\Security;

class OrderCheckout extends BaseController
{
    /**
     * Оформление заказа
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws BillingException
     * @throws CommunicationException
     */
    public function checkoutAction(Request $request): \Symfony\Component\HttpFoundation\Response
    {
        $isLogged = (new Security($request->getSession()))->isLogged();
        if (!$isLogged) {
            return $this->redirect('user_authentication');
        }

        (new Basket($request->getSession()))->checkout();

        return $this->render('order/checkout.html.php');
    }
}