<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class FormulaireController extends AbstractController
{
    /**
     * @Route("/formulaire", name="formulaire")
     */
    public function index(): Response
    {
        return $this->render('formulaire/index.html.twig', [
            'controller_name' => 'FormulaireController',
        ]);
    }

    /**
     * @Route("/ajoutUser", name="ajoutUser")
     */
    public function newForm(Request $request, ObjectManager $manager){

        $user = new User();

        $form = $this->createFormBuilder($user)
                     ->add("nom")
                     ->add("prenom")
                     ->add("adresse")
                     ->add("tel")
                     ->add("email")
                     ->add("password")
                     ->getForm();



        return $this->render("formulaire/index.html.twig", [
            "formUser" => $form->createView()
        ]);
    }
}
