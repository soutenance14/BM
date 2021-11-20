<?php

namespace App\DataFixtures;

use App\Entity\Client;
use App\Entity\Phone;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $phone = new Phone();
        $phone->setName("Nokia 3310");
        $phone->setPrice("330");
        $phone->setDescription("Beautiful");
        $manager->persist($phone);
        
        $client = new Client();
        $client->setEmail("a@gmail.com")
        ->setPassword($this->encoder->encodePassword($client, "password"))
        ->setRoles(['ROLE_USER']);
        $manager->persist($client);

        $user = new User();
        $user->setFirstName("Paul");
        $user->setLastName("Verlaine");
        $user->setEmail("b@gmail.com");
        $user->setClient($client);
        $manager->persist($user);
        
        $manager->flush();
    }
}
