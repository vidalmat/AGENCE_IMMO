<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspacemembreController extends AbstractController
{
    /**
     * @Route("/espacemembre", name="espacemembre")
     */
    public function index(): Response
    {
        return $this->render('espacemembre/index.html.twig', [
            'controller_name' => 'EspacemembreController',
        ]);
    }
}
