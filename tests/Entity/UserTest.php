<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\Agent;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    protected $validator;

    public function getUserEntity(): User
    {
        $roles[] = 'ROLE_USER';

        $agent = (new Agent)
            ->setNom('aaaa')
            ->setPrenom('aaaa')
            ->setTel('aaaa');

        return (new User)
            ->setEmail('aaaa')
            ->setRoles($roles)
            ->setPassword('aaaa')
            ->setAgent($agent);
    }

    public function setUp(): void{

        $kernel = self::bootKernel();

        $this->validator = self::$container->get('validator');
    }

    public function testUserEntity(): void{
        $error = $this->validator->validate($this->getUserEntity());

        $this->assertInstanceOf(User::class, $this->getUserEntity());
        $this->assertCount(1, $error);
    }
}
