<?php

namespace App\Tests;

use App\Entity\Biens;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BiensTest extends KernelTestCase
{
    protected $validator;

    public function getBiensEntity(): Biens{

        return (new Biens)
            ->setNom('aaaa')
            ->setAdresse('aaa')
            ->setVille('aaaa')
            ->setCp('aaaa')
            ->setPrix('aaaa');
    }

    public function setUp(): void{
        $kernel = self::bootKernel();
        $this->validator = self::$container->get('validator');
    }

    public function testBiensEntity(): void{
        $error = $this->validator->validate($this->getBiensEntity());
        $this->assertInstanceOf(Biens::class, $this->getBiensEntity());
        $this->assertCount(0, $error);

    }
}
