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
    public function index(CalendrierRepository $calendar): Response
    {
        $events = $calendar->findAll();

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
                "couleur_texte" => $event->getCouleurTexte(),
            ];
        }

        $data = json_encode($rdvs); // j'encode les données de mon tableau au format json

        // Je crée une variable $contenu qui sera égale à → si le fichier existe dans mon dossier datas et fichier JSON,
        // alors, récupère le contenu dans ce même fichier
        $contenu = (file_exists("datas/rdvs.json"))? file_get_contents("datas/rdvs.json") : "";
        //var_dump($contenu);
    
        // Si $rdvs est un tableau, alors tu l'insères dans celui-ci([]).
        $rdvs = (is_array($rdvs))? $rdvs : [];
    
        // $rdv aura ses propriétés retournées avec get_object_vars(), 
        // car $this ne peut pas être encoder avec un json_encode, c'est obligatoire
        $rdv = get_object_vars($this);
        //var_dump($rdv);
    
        // Je crée une nouvelle variable ($handle), qui ouvrira mon fichier JSON(rdv.json) dans mon dossier datas, 
        //je concatène aussi “w” (ouvre le fichier en écriture seulement, 
        //crée le fichier s'il n'existe pas sauf que les données contenues précédemment seront effacées)
        $handle = fopen("datas/rdvs.json", "w");

        // $json réencodera mon tableau au format JSON
        $json = json_encode($rdvs);
        //var_dump($json);

        // J'écris (fwrite()) mes deux variables ($handle et $json) devenues une chaîne JSON dans mon fichier livres.json.
        fwrite($handle, $json);

        // Je ferme (fclose()) mon fichier de ma variable $handle.
        fclose($handle);

        return $this->render('rdv/index.html.twig', compact("data")); // compact crée un tableau à partir des variables et de la valeur de data
    }


    static function getRdvs(): array {

        // Je crée une variable $contenu qui sera égale à → si le fichier existe dans mon dossier datas et fichier JSON,
        // alors, récupère le dans ce même fichier
        $contenu = (file_exists("datas/rdvs.json"))? file_get_contents("datas/rdvs.json") : "";
        //var_dump($contenu);

        // $livre correspondra à → à décoder (json_decode()) mon fichier JSON en tableau PHP
        $rdvs = json_decode($contenu);
        //var_dump($rdvs);

        // Si $rdvs est un tableau, alors tu l'insères dans celui-ci([]).
        $rdvs = (is_array($rdvs))? $rdvs : [];
        
        return $rdvs;
    }

}
