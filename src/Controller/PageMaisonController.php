<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageMaisonController extends AbstractController
{
    /**
     * @Route("/page/maison", name="page_maison")
     */
    public function index(): Response
    {
        return $this->render('page_maison/index.html.twig', [
            'controller_name' => 'PageMaisonController',
        ]);
    }
}
