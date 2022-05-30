<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/fashee/discover', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/fashe_home.html.twig');
    }
}
