<?php

namespace App\Controller;

use App\Entity\Bien;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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


    /**
     * @Route("/add_bien", name="add_bien")
     */
    public function addBien(Request $request, ObjectManager $manager): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $bien = new Bien();

            // $bien->setRoles(["ROLE_USER"]);
            $bien->setImage($request->request->get("image"));
            $bien->setNom($request->request->get("nom"));
            $bien->setPrix($request->request->get("prix"));
            $bien->setAdresse($request->request->get("adresse"));
            $bien->setVille($request->request->get("ville"));
            $bien->setCp($request->request->get("cp"));

            $manager->persist($bien);
            $manager->flush();
            dump($bien);
        

        // dump($request->request);
        return $this->redirectToRoute("add_bien");
    }
}
