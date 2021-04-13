<?php

namespace App\Controller;

use App\Entity\Bien;
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
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }
        
        $user = new User();
        $client = new Client();

        // $userform = $this->createForm(UserType::class, $user, [
        //     "action" => $this->generateUrl("add_user"),
        //     "method" => "post",
        // ]);

        // $userform = $this->createFormBuilder($client)
        //              ->setAction($this->generateUrl("add_user"))
        //              ->add("nom")
        //              ->add("prenom")
        //              ->add("adresse")
        //              ->add("tel")
        //             //  ->add("email")
        //             //  ->add("password")
        //              ->getForm();

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
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
        $agent = new Agent();

        // $userform = $this->createForm(UserType::class, $user, [
        //     "action" => $this->generateUrl("add_user"),
        //     "method" => "POST",
            
        // ]);

        // $userform = $this->createFormBuilder($user)
        //              ->setAction($this->generateUrl("add_user"))
        //              ->add("nom")
        //              ->add("prenom")
        //              ->add("adresse")
        //              ->add("tel")
        //              ->add("email")
        //              ->add("password")
        //              ->getForm();


        // $userform->handleRequest($request);

        // if($userform->isSubmitted() && $userform->isValid()) {

            $user->setRoles(["ROLE_USER"]);
            $user->setEmail($request->request->get("email"));
            $user->setPassword($encoder->encodePassword($user, $request->request->get("password")));
            $manager->persist($user);
            dump($user);

            $client->setNom($request->request->get("nom"));
            $client->setPrenom($request->request->get("prenom"));
            $client->setAdresse($request->request->get("adresse"));
            $client->setVille($request->request->get("ville"));
            $client->setCp($request->request->get("cp"));
            $client->setTel($request->request->get("tel"));
            $client->setUser($user);

            // $agent->setNom($request->request->get("nom"));
            // $agent->setPrenom($request->request->get("prenom"));
            // $agent->setTel($request->request->get("tel"));
            // $agent->setUser($user);
            // $manager->persist($agent);

            $manager->persist($client);
            $manager->flush();
        

        dump($request->request);
        return $this->redirectToRoute("app_login");
    }




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
            dump($bien);
        

        dump($request->request);
        return $this->redirectToRoute("app_add_bien");
    }
}
