<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/page", name="home")
     */
    public function index(PropertyRepository $repo)
    {
        return $this->render('page/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
