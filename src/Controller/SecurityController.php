<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Agent;
use App\Entity\Client;
use App\Form\UserType;
use App\Form\ClientType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    /**
     * @Route("/app_login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, UserPasswordEncoderInterface $encoder, Request $request, ObjectManager $manager): Response
    {
        // Cette ligne correspond aux erreurs de connexions
        $error = $authenticationUtils->getLastAuthenticationError();
        // Dernier utilisateur gardé en mémoire
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig',
         ['last_username' => $lastUsername, 'error' => $error]);
    }
    

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    /**
     * @Route("/add_user", name="add_user")
     */
    public function addUser(UserPasswordEncoderInterface $encoder, Request $request, ObjectManager $manager): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $user = new User(); 
        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);
        $formuser = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        $formuser->handleRequest($request);
        if($formuser->isSubmitted() && $formuser->isValid()){
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
            $client->setUser($user);
            if($form->isSubmitted() && $form->isValid()){
                $manager->persist($user);
                $manager->persist($client);
                $manager->flush();
                return $this->redirectToRoute("app_login");
            }
        }

        return $this->render("security/login.html.twig", [
            'form'=> $form->createView(), 
            'formuser'=> $formuser->createView()
        ]);
    }

    
    
}
