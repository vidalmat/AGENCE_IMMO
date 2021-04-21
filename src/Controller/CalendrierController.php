<?php

namespace App\Controller;

use App\Entity\Calendrier;
use App\Form\CalendrierType;
use App\Repository\CalendrierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/calendrier")
 */
class CalendrierController extends AbstractController
{
    /**
     * @Route("/", name="calendrier", methods={"GET"})
     */
    public function index(CalendrierRepository $calendrierRepository): Response
    {
        return $this->render('calendrier/index.html.twig', [
            'calendriers' => $calendrierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="calendrier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $calendrier = new Calendrier();
        $form = $this->createForm(CalendrierType::class, $calendrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($calendrier);
            $entityManager->flush();

            return $this->redirectToRoute('calendrier');
        }

        return $this->render('calendrier/new.html.twig', [
            'calendrier' => $calendrier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calendrier_show", methods={"GET"})
     */
    public function show(Calendrier $calendrier): Response
    {
        return $this->render('calendrier/show.html.twig', [
            'calendrier' => $calendrier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="calendrier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Calendrier $calendrier): Response
    {
        $form = $this->createForm(CalendrierType::class, $calendrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calendrier');
        }

        return $this->render('calendrier/edit.html.twig', [
            'calendrier' => $calendrier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calendrier_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Calendrier $calendrier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calendrier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($calendrier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('calendrier');
    }
}
