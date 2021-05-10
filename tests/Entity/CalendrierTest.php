<?php

namespace App\Tests;

use App\Entity\Agent;
use App\Entity\Client;
use App\Entity\Calendrier;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalendrierTest extends KernelTestCase
{
    protected $validator;

    public function getCalendrierEntity(): Calendrier{

        $client = (new Client)
            ->setNom('aaaa')
            ->setPrenom('aaaa')
            ->setAdresse('aaaa')
            ->setTel('aaaa')
            ->setVille('aaaa')
            ->setCp('aaaa');

        $agent = (new Agent)
        ->setNom('aaaa')
        ->setPrenom('aaaa')
        ->setTel('aaaa');

        return $calendrier = (new Calendrier)
            ->setTitre('aaaa')
            ->setDebut(new \DateTime()) // Pour la valeur en DateTime
            ->setFin(new \DateTime())  // Pour la valeur en DateTime
            ->setDescription('aaaa')
            ->setJournee('aaaa')
            ->setCouleurFond('aaaa')
            ->setCouleurBordure('aaaa')
            ->setCouleurTexte('aaaa');
    }

    public function setUp(): void{
        $kernel = self::bootKernel();
        $this->validator = self::$container->get('validator');
    }

    public function testCalendrierEntity(): void{
        $error = $this->validator->validate($this->getCalendrierEntity());
        $this->assertInstanceOf(Calendrier::class, $this->getCalendrierEntity());
        $this->assertCount(0, $error);
    }
}
