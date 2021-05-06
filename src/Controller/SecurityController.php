<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Agent;
use App\Entity\Client;
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
        $user = new User();
        $client = new Client();

        // Cette ligne correspond aux erreurs de connexions
        $error = $authenticationUtils->getLastAuthenticationError();
        // Dernier utilisateur gardé en mémoire
        $lastUsername = $authenticationUtils->getLastUsername();

        dump($request->request);
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

        $user->setRoles(["ROLE_USER"]);
        $user->setEmail($request->request->get("email"));
        $user->setPassword($encoder->encodePassword($user, $request->request->get("password")));
        $manager->persist($user);
        dump($user);
        
        $client->setData($request->request->all());
        $client->setUser($user);

        $manager->persist($client);
        $manager->flush();
       
        dump($request->request);
        return $this->redirectToRoute("app_login");
    }
    
}
