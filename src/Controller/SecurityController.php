<?php

namespace App\Controller;

use App\Entity\User;
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
     * @Route("/formulaire", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, UserPasswordEncoderInterface $encoder, Request $request, ObjectManager $manager): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }
        $user = new User();

        $userform = $this->createForm(UserType::class, $user, [
            "action" => $this->generateUrl("add_user"),
            "method" => "post",
        ]);

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    /**
     * @Route("/formulaire", name="add_user")
     */
    public function addUser(UserPasswordEncoderInterface $encoder, Request $request, ObjectManager $manager): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $user = new User();

        $userform = $this->createForm(UserType::class, $user, [
            "action" => $this->generateUrl("formUser"),
            "method" => "post",
        ]);

        $user = new User();
        $userform->handleRequest($request);

        if($userform->isSubmitted() && $userform->isValid()) {

            $user->setPassword($encoder->encodePassword($user, $request->request->get("password")));
            $user->setRoles(["ROLE_USER"]);
            $user->setEmail($request->request->get("email"));
            $manager->persist($user);
            dump($user);
            $manager->flush();
        }

        return $this->redirectToRoute("app_login");
    }
}
