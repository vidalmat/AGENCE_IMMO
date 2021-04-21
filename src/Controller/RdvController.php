<?php

namespace App\Controller;

use App\Repository\CalendrierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvController extends AbstractController
{
    /**
     * @Route("/rdv", name="rdv")
     */
    public function index(CalendrierRepository $calendrier): Response
    {
        $events = $calendrier->findAll();

        $rdvs = []; // mettre ma variable sous forme de tableau

        // dd($events); // fait apparaître mes évenements retournés dans mon debugger


        foreach($events as $event){
            $rdvs[] = [ // fabrication de mon tableau avec les informations attendus par mon calendrier
                "id" => $event->getId(),
                "debut" => $event->getDebut()->format("Y-m-d H:i:s"), // format : avec le datetime, format est sous forme de chaîne 
                // de caractère, je récupère donc entre les (), la date au format texte 
                "fin" => $event->getFin()->format("Y-m-d H:i:s"),
                "titre" => $event->getTitre(),
                "description" => $event->getDescription(),
                "journee" => $event->getJournee(),
                "couleur_fond" => $event->getCouleurFond(),
                "couleur_bordure" => $event->getCouleurBordure(),
                "couleur_texte" => $event->getCouleurTexte()
            ];
        }

        $data = json_encode($rdvs); // j'encode les données de mon tableau au format json

        return $this->render('rdv/index.html.twig', compact("data")); // compact crée un tableau à partir des variables et de la valeur de data
    }
}
