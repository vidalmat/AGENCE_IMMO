<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienController extends AbstractController
{
    /**
     * @Route("/bien", name="bien")
     */
    public function index(): Response
    {
        return $this->render('bien/index.html.twig', [
            'controller_name' => 'BienController',
        ]);
    }
}
