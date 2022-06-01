<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/fashee/shop', name: 'app_shop')]
    public function displayFasheeShop(): Response
    {
        return $this->render('shop/fashee_shop.html.twig');
    }

    #[Route('/fashee/cart', name: 'app_cart')]
    public function displayCustomerCart(): Response
    {
        return $this->render('shop/fashee_cart.html.twig');
    }


    #[Route('/fashee/checkout', name: 'app_checkout')]
    public function orderCheckout(): Response
    {
        return $this->render('shop/fashee_checkout.html.twig');
    }

}
