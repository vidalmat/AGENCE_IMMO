<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspaceagentController extends AbstractController
{
    /**
     * @Route("/espaceagent", name="espaceagent")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        return $this->render('espaceagent/index.html.twig', [
            'controller_name' => 'EspaceagentController',
            "user" => $user
        ]);
    }
}
