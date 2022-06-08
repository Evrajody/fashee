<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ShopController extends AbstractController 
{

    #[Route('/fashee/shop', name: 'app_shop')]
    public function displayFasheeShop(ArticleRepository $articleRepository, PaginatorInterface $paginator, Request $request): Response
    {
 
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



    #[Route('/fashee/add/cart', name: 'app_add_cart', methods: ["post"])]
    public function addToCart(Request $request, ArticleRepository $articleRepository, SessionInterface $session): Response
    {
        // Transformation OBJET EN JSON (Serialisation)
        // Preparer un tableau de normaliser et d'encoder
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

       // L'article qui devra etre ajouter dans le panier
        $article = $articleRepository->findOneById($request->request->get('id'));

        // Ajout au panier 
        $panier = $session->get('panier', []);
        $total = $session->get('total', 0);


        if (!empty($panier[$article->getId()])) {
            $panier[$article->getId()]["quantite"]++;
        } else {
            $panier[$article->getId()] = [
                "produit" => $article,
                "quantite" => 1
             ];
        }

        // On met a jout le total 
        foreach ($panier as $item ) {
            $totalItem = $item["produit"]->getPrix() * $item["quantite"];
            $total += $totalItem;
        }

        $session->set("total", $total);
        $session->set("panier", $panier);

        
        // En cas de reference circulaire
        $jsonContent = $serializer->serialize($article, 'json', [
            ObjectNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($Object) {return $Object->getId();}
        ]);
        
        return  $this->json(json_decode($jsonContent));

    }

}


