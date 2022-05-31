<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/fashee/shop', name: 'app_shop')]
    public function index(): Response
    {
        return $this->render('shop/fashee_shop.html.twig');
    }
}
