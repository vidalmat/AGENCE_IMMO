<?php

namespace App\DataFixtures;

use App\Entity\Rdv;
use App\Entity\Bien;
use App\Entity\Categorie;
use DateTime;
use DateTimeZone;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 0; $i < 3; $i++) {
            $cat = new Categorie();
            $cat->setType("Catégorie " . $i);
            $manager->persist($cat);
        }

        for($i = 0; $i < 3; $i++) {
            $rdv = new Rdv();
            $rdv->setDate(new DateTime("now", new DateTimeZone("europe/paris")))
                ->setMotif("Pour une visite " . $i);
            $manager->persist($rdv);
        }

        for($i = 0; $i < 5; $i++) {
            $bien=new Bien();
        $bien->setnom("Le bien du nom de" . $i)
            ->setPrix($i)
            ->setAdresse("L'adresse :" . $i)
            ->setVille("La ville :" . $i)
            ->setCp("Code postal :" . $i)
            ->setImage("abcd");
            $manager->persist($bien);
        }

        $manager->flush();
    }
}
