<?php

namespace App\DataFixtures;

use App\Entity\Bien;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i = 0; $i < 5; $i++) {
            $bien=new Bien();
        $bien->setnom("Le bien du nom de" . $i)
            ->setPrix($i)
            ->setAdresse("L'adresse :" . $i)
            ->setImage("abcd");
            $manager->persist($bien);
        }

        $manager->flush();
    }
}
