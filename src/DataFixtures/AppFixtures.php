<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Voiture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $marque1 = new Marque();
        // $marque1->setLibelle("Toyota");
        // $manager->persist($marque1);
        // $marque2 = new Marque();
        // $marque2->setLibelle("Ford");
        // $manager->persist($marque2);
        // $marque3 = new Marque();
        // $marque3->setLibelle("Peugeot");
        // $manager->persist($marque3);
        // $marque4 = new Marque();
        // $marque4->setLibelle("Porche");
        // $manager->persist($marque4);
        // $marque5 = new Marque();
        // $marque5->setLibelle("Tata");
        // $manager->persist($marque5);

        // $modele1 = new Modele();
        // $modele1->setLibelle("206")
        //         ->setImage("modele1.jpg")
        //         ->setPrixMoyen(5000)
        //         ->setMarque($marque3);
        // $manager->persist($modele1);

        // $modele2 = new Modele();
        // $modele2->setLibelle("Mustang")
        //         ->setImage("modele2.jpg")
        //         ->setPrixMoyen(35000)
        //         ->setMarque($marque2);
        // $manager->persist($modele2);

        // $modele3 = new Modele();
        // $modele3->setLibelle("Cayenne")
        //         ->setImage("modele3.jpg")
        //         ->setPrixMoyen(44000)
        //         ->setMarque($marque4);
        // $manager->persist($modele3);

        // $modele4 = new Modele();
        // $modele4->setLibelle("Focus")
        //         ->setImage("modele4.jpg")
        //         ->setPrixMoyen(25000)
        //         ->setMarque($marque2);
        // $manager->persist($modele4);

        // $modele5 = new Modele();
        // $modele5->setLibelle("Vroum Vroum")
        //         ->setImage("modele5.jpg")
        //         ->setPrixMoyen(12000)
        //         ->setMarque($marque5);
        // $manager->persist($modele5);

        // $modele6 = new Modele();
        // $modele6->setLibelle("Prius")
        //         ->setImage("modele5.jpg")
        //         ->setPrixMoyen(15000)
        //         ->setMarque($marque1);
        // $manager->persist($modele6);

        // $modele7 = new Modele();
        // $modele7->setLibelle("Panamera")
        //         ->setImage("modele5.jpg")
        //         ->setPrixMoyen(47000)
        //         ->setMarque($marque1);
        // $manager->persist($modele7);

        // $modeles = [$modele1, $modele2, $modele3, $modele4 ,$modele5, $modele6, $modele7];

        // $faker = \Faker\Factory::create('fr_FR');
        // foreach($modeles as $m){
        //     $rand = rand(3,30);
        //     for($i=1; $i <= $rand; $i++){
        //         $voiture = new Voiture();
        //         //XX1234XX
        //         $voiture->setImmatriculation($faker->regexify("[A-Z]{2}[0-9]{3}[A-Z]{2}"))
        //                 ->setNbPortes($faker->randomElement($array = array(3,5)))
        //                 ->setAnnee($faker->numberBetween($min = 1990, $max = 2020))
        //                 ->setModele($m);
        //         $manager->persist($voiture);
        //     }
        // }


        // $manager->flush();
    }
}
