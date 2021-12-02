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
    private $manager;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
        //PHONE
        $this->makePhone("Huawei Y8", "125", "Téléphone de marque Chinoise pas cher");
        $this->makePhone("Huawei Sun", "138", "Téléphone très robuste");
        $this->makePhone("LG 45", "148", "Sobriété, efficacité");
        $this->makePhone("LG Big S", "278", "Téléphone dotée d'un large écran");
        $this->makePhone("Samsung Galaxy S9", "254", "Un des meilleurs de sa catégorie");
        $this->makePhone("Samsung Galaxy S10", "458", "Elu meilleur téléphone de l'année 2021");
        $this->makePhone("IPhone Serge", "1200", "Bijoux de téchnologie.");
        $this->makePhone("IPhone 12", "700", "Fiable, faisant partie des meilleurs ventes de l'année 2021");
        
        //CLIENT
        $clientA = $this->makeClient("ca@gmail.com", "password", ["ROLE_USER"]);
        $clientB = $this->makeClient("cb@gmail.com", "password", ["ROLE_USER"]);
        
        //USER
        $this->makeUser("Paul", "Verlaine", "paul@gmail.com", $clientA);
        $this->makeUser("Arthur", "Rimbaud", "arthur@gmail.com", $clientA);
        $this->makeUser("Victor", "Hugo", "victor@gmail.com", $clientB);
        $this->makeUser("Alexandre", "Dumas", "alexandre@gmail.com", $clientB);
        
        $this->manager->flush();
    }
    
    private function makePhone($name, $price, $description)
    {
        $phone = new Phone();
        $phone->setName($name);
        $phone->setPrice($price);
        $phone->setDescription($description);
        $this->manager->persist($phone);
    }
    private function makeClient($email, $password, $roles): Client
    {
        $client = new Client();
        $client->setEmail($email)
        ->setPassword($this->encoder->encodePassword($client, $password))
        ->setRoles($roles);
        $this->manager->persist($client);
        return $client;
    }
    private function makeUser($firstName, $lastName, $email, $client)
    {
        $user = new User();
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setEmail($email);
        $user->setClient($client);
        $this->manager->persist($user);
    }
}
