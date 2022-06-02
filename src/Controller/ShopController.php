<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends AbstractController
{
    #[Route('/fashee/shop', name: 'app_shop')]
    public function displayFasheeShop(ArticleRepository $articleRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // dd($manager->getRepository(Category::class)->findOneById(rand(1, 6)));

        $articles = $paginator->paginate( 
            $articleRepository->findAll(),   
            $request->query->getInt('page', 1), 6) ;

        return $this->render('shop/fashee_shop.html.twig', compact("articles"));
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



    #[Route('/fashee/add/cart', name: 'app_add_cart')]
    public function addToCart(): Response
    {
        return $this->json(['Articles' =>'value'],200);
    }

}
