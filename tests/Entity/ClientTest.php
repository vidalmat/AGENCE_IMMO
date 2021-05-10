<?php

namespace App\Tests;

use App\Entity\Rdv;
use App\Entity\User;
use App\Entity\Agent;
use App\Entity\Client;
use App\Entity\Calendrier;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ClientTest extends KernelTestCase
{
    protected $validator;

    public function getClientEntity(): Client{

        $roles[] = 'ROLE_USER';

        $user = (new User)
            ->setEmail('aaaa')
            ->setRoles($roles)
            ->setPassword('aaaa');

        $rdv = (new Rdv);

        $calendrier = (new Calendrier)
            ->setTitre('aaaa')
            ->setDebut(new \DateTime()) // Pour la valeur en DateTime
            ->setFin(new \DateTime())  // Pour la valeur en DateTime
            ->setDescription('aaaa')
            ->setJournee('aaaa')
            ->setCouleurFond('aaaa')
            ->setCouleurBordure('aaaa')
            ->setCouleurTexte('aaaa');

        $agent = (new Agent)
        ->setNom('aaaa')
        ->setPrenom('aaaa')
        ->setTel('aaaa');

        return (new Client)
            ->setNom('aaaa')
            ->setPrenom('aaaa')
            ->setAdresse('aaaa')
            ->setTel('aaaa')
            ->setVille('aaaa')
            ->setCp('84200')
            ->setAgent($agent)
            ->setUser($user)
            ->addCalendrier($calendrier)
            ->setRdv($rdv);
    }


    public function setUp(): void{
        $kernel = self::bootKernel();
        $this->validator = self::$container->get('validator');
    }

    public function testClientEntity(): void{
        $error = $this->validator->validate($this->getClientEntity()->setPrenom(''));
        // dd($error);
        $this->assertInstanceOf(Client::class, $this->getClientEntity());
        $this->assertCount(1, $error);
    }


    
}
