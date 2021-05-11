<?php

namespace App\Tests;

use App\Entity\Rdv;
use App\Entity\User;
use App\Entity\Agent;
use App\Entity\Client;
use App\Entity\Calendrier;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AgentTest extends KernelTestCase
{
    protected $validator;

    public function getAgentEntity(): Agent{

        $roles[] = 'ROLE_USER';

        $user = (new User)
            ->setEmail('aaaa')
            ->setRoles($roles)
            ->setPassword('aaaa');

        $client = (new Client)
            ->setNom('aaaa')
            ->setPrenom('aaaa')
            ->setAdresse('aaaa')
            ->setTel('aaaa')
            ->setVille('aaaa')
            ->setCp('aaaa');

        $calendrier = (new Calendrier)
            ->setTitre('aaaa')
            ->setDebut(new \DateTime()) // Pour la valeur en DateTime
            ->setFin(new \DateTime())  // Pour la valeur en DateTime
            ->setDescription('aaaa')
            ->setJournee('aaaa')
            ->setCouleurFond('aaaa')
            ->setCouleurBordure('aaaa')
            ->setCouleurTexte('aaaa');

        return (new Agent)
            ->setNom('aaaa')
            ->setPrenom('aaaa')
            ->setTel('aaaa')
            ->addClient($client)
            ->setUser($user)
            ->addCalendrier($calendrier);

    }

    public function setUp(): void{

        $kernel = self::bootKernel();

        $this->validator = self::$container->get('validator');
    }

    public function testEntityAgent(): void{

        $error = $this->validator->validate($this->getAgentEntity());

        $this->assertInstanceOf(Agent::class, $this->getAgentEntity()->setNom(''));
        $this->assertCount(0, $error);
    }


                      // ----------------- EXEMPLES DU CODES SANS L'AVOIR RÉDUIT ----------------------

    // public function testAgent(): void
    // {
    //     $agent = (new Agent)
    //         ->setNom('aaaa')
    //         ->setPrenom('aaaa')
    //         ->setTel('aaaa');

    //     $roles[] = 'ROLE_USER';

    //     $user = (new User)
    //         ->setEmail('aaaa')
    //         ->setRoles($roles)
    //         ->setPassword('aaaa');

    //     $client = (new Client)
    //         ->setNom('aaaa')
    //         ->setPrenom('aaaa')
    //         ->setAdresse('aaaa')
    //         ->setTel('aaaa')
    //         ->setVille('aaaa')
    //         ->setCp('aaaa');

    //     $rdv = (new Rdv);

    //     $calendrier = (new Calendrier)
    //         ->setTitre('aaaa')
    //         ->setDebut(new \DateTime()) // Pour la valeur en DateTime
    //         ->setFin(new \DateTime())  // Pour la valeur en DateTime
    //         ->setDescription('aaaa')
    //         ->setJournee('aaaa')
    //         ->setCouleurFond('aaaa')
    //         ->setCouleurBordure('aaaa')
    //         ->setCouleurTexte('aaaa');

    //     $kernel = self::bootKernel();

    //     $this->validator = self::$container->get('validator');

    //     $error = $this->validator->validate($agent);

    //     $this->assertInstanceOf(Agent::class, $agent);
    //     $this->assertCount(0, $error);

    //     // $this->assertTrue(true);
    // }


    // public function testAgentnameIsNotBlank(): void // test pour vérifier que le champs du nom de l'agent n'est pas vide
    // {
    //     $agent = (new Agent)
    //         ->setNom('')
    //         ->setPrenom('aaaa')
    //         ->setTel('aaaa');

    //     $roles[] = 'ROLE_USER';

    //     $user = (new User)
    //         ->setEmail('aaaa')
    //         ->setRoles($roles)
    //         ->setPassword('aaaa');

    //     $client = (new Client)
    //         ->setNom('aaaa')
    //         ->setPrenom('aaaa')
    //         ->setAdresse('aaaa')
    //         ->setTel('aaaa')
    //         ->setVille('aaaa')
    //         ->setCp('aaaa');

    //     $rdv = (new Rdv);

    //     $calendrier = (new Calendrier)
    //         ->setTitre('aaaa')
    //         ->setDebut(new \DateTime()) // Pour la valeur en DateTime
    //         ->setFin(new \DateTime())  // Pour la valeur en DateTime
    //         ->setDescription('aaaa')
    //         ->setJournee('aaaa')
    //         ->setCouleurFond('aaaa')
    //         ->setCouleurBordure('aaaa')
    //         ->setCouleurTexte('aaaa');

    //     $kernel = self::bootKernel();

    //     $this->validator = self::$container->get('validator');

    //     $error = $this->validator->validate($agent);

    //     // dd($error);

    //     $this->assertCount(1, $error);

    //     // $this->assertTrue(true);
    // }


    // public function testAgentsurnameIsNotBlank(): void // test pour vérifier que le champs du prénom de l'agent n'est pas vide
    // {
    //     $agent = (new Agent)
    //         ->setNom('aaaa')
    //         ->setPrenom('')
    //         ->setTel('aaaa');

    //     $roles[] = 'ROLE_USER';

    //     $user = (new User)
    //         ->setEmail('aaaa')
    //         ->setRoles($roles)
    //         ->setPassword('aaaa');

    //     $client = (new Client)
    //         ->setNom('aaaa')
    //         ->setPrenom('aaaa')
    //         ->setAdresse('aaaa')
    //         ->setTel('aaaa')
    //         ->setVille('aaaa')
    //         ->setCp('aaaa');

    //     $rdv = (new Rdv);

    //     $calendrier = (new Calendrier)
    //         ->setTitre('aaaa')
    //         ->setDebut(new \DateTime()) // Pour la valeur en DateTime
    //         ->setFin(new \DateTime())  // Pour la valeur en DateTime
    //         ->setDescription('aaaa')
    //         ->setJournee('aaaa')
    //         ->setCouleurFond('aaaa')
    //         ->setCouleurBordure('aaaa')
    //         ->setCouleurTexte('aaaa');

    //     $kernel = self::bootKernel();

    //     $this->validator = self::$container->get('validator');

    //     $error = $this->validator->validate($agent);

    //     // dd($error);

    //     $this->assertCount(1, $error);

    //     // $this->assertTrue(true);
    // }
}
