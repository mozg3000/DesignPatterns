<?php


namespace Controller\PageControllers\OrderPages;


use Framework\BaseController;
use Service\Order\Basket;
use Service\User\Security;

class OrderInfo extends BaseController
{
    /**
     * Корзина
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws Exception
     */
    public function infoAction(Request $request): \Symfony\Component\HttpFoundation\Response
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            return $this->redirect('order_checkout');
        }

        $basket = new Basket($request->getSession());
        $productList = $basket->getProductsInfo();
        $totalPrice = $basket->calculateProductsTotalPrice();
        $isLogged = (new Security($request->getSession()))->isLogged();

        return $this->render(
            'order/info.html.php',
            [
                'productList' => $productList,
                'isLogged' => $isLogged,
                'totalPrice' => $totalPrice
            ]
        );
    }
}