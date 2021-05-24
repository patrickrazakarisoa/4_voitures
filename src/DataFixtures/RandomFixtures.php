<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Voiture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use PhpParser\Node\Expr\AssignOp\Mod;

class RandomFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
   
        $marque1 = new Marque();
        $marque1->setLibelle("Toyota");
        $manager->persist($marque1);
        $marque2 = new Marque();
        $marque2->setLibelle("Ford");
        $manager->persist($marque2);
        $marque3 = new Marque();
        $marque3->setLibelle("Peugeot");
        $manager->persist($marque3);
        $marque4 = new Marque();
        $marque4->setLibelle("Porche");
        $manager->persist($marque4);
        $marque5 = new Marque();
        $marque5->setLibelle("Tata");
        $manager->persist($marque5);
        $marque6 = new Marque();
        $marque6->setLibelle("Tesla");
        $manager->persist($marque6);
        $marque7 = new Marque();
        $marque7->setLibelle("Mazda");
        $manager->persist($marque7);
        $marque8 = new Marque();
        $marque8->setLibelle("Renault");
        $manager->persist($marque8);
        $marque9 = new Marque();
        $marque9->setLibelle("Fiat");
        $manager->persist($marque9);
        $marque10 = new Marque();
        $marque10->setLibelle("Volvo");
        $manager->persist($marque10);
        $marque11 = new Marque();
        $marque11->setLibelle("Mercedes");
        $manager->persist($marque11);
        $marque12 = new Marque();
        $marque12->setLibelle("BMW");
        $manager->persist($marque12);
        

        $marques = [$marque1, $marque2, $marque3, $marque4 ,$marque5, $marque6, $marque7, $marque8, $marque9, $marque10, $marque11, $marque12];

        $faker = \Faker\Factory::create('fr_FR');

        foreach($marques as $m){

            $round1 = rand(2,3);
            for($i=1; $i <= $round1; $i++){
                $modele = new Modele();
                $modele->setLibelle($faker->regexify("[A-Z]{2}[0-9]{2}"))
                        ->setPrixMoyen($faker->numberBetween($min = 15000, $max = 50000))
                        ->setImage($faker->randomElement($array = array ('modele1.jpg','modele2.jpg','modele3.jpg','modele4.jpg','modele5.jpg')))
                        ->setMarque($m);
                $manager->persist($modele);
            }
       
            $round2 = rand(3,6);
            for($i=1; $i <= $round2; $i++){
                $voiture = new Voiture();
                //XX1234XX
                $voiture->setImmatriculation($faker->regexify("[A-Z]{2}[0-9]{3}[A-Z]{2}"))
                        ->setNbPortes($faker->randomElement($array = array(3,5)))
                        ->setAnnee($faker->numberBetween($min = 1990, $max = 2020))
                        ->setModele($faker->randomElement($array = array($modele)));
                $manager->persist($voiture);
            }
        }
        


        $manager->flush();
    }
}
