<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use App\Entity\Plat;
use Faker\Generator;
use Faker\Factory;
use App\Entity\Couvert;
use App\Entity\Formule;
use App\Entity\Allergene;
use App\Entity\Categorie;
use App\Entity\Calendrier;
use App\Entity\Reservation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }


    public function load(ObjectManager $manager): void
    {
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $allergenes = ['Gluten', 'Crustacés', 'Oeufs', 'Poissons', 'Arachides', 'Soja', 'Lait', 'Fruits à coque', 'Céleri', 'Moutarde', 'Graines de sésame', 'Sulfites', 'Lupin', 'Mollusques'];
        $categories = ['Entrée', 'Plat', 'Dessert', 'Boisson'];

        foreach ($jours as $jour) {
            $calendrier = new Calendrier();
            $calendrier->setJour($jour);
            if($jour ===  'Lundi'){
                $calendrier->setOuvertureMidi(00.00);
                $calendrier->setFermetureMidi(00.00);
            }
            else{
                $calendrier->setOuvertureMidi(12.00);
                $calendrier->setFermetureMidi(14.00);
            }
            $calendrier->setOuvertureSoir(19.00);
            if($jour === 'Samedi'){
                $calendrier->setFermetureSoir(23.00);
            }
            else{
                $calendrier->setFermetureSoir(22.00);
            }
            if($jour === 'Dimanche'){
                $calendrier->setIsOpen(false);
            }
            else{
                $calendrier->setIsOpen(true);
            }
            $manager->persist($calendrier);
        }

        foreach ($allergenes as $allergene) {
            $allergenes = new Allergene();
            $allergenes ->setNom($allergene);
            $manager->persist($allergenes);
        }

        $couvert = new Couvert();
        $couvert->setNbCouvert(25);
        $manager->persist($couvert);

        foreach($categories as $categorie){
            $categories = new Categorie();
            $categories->setNom($categorie);
            $manager->persist($categories);
        }

        $menu = new Menu();
        $menu->setNom('Menu Classique');
        $manager->persist($menu);

        $menu = new Menu();
        $menu->setNom('Menu de la mer');
        $manager->persist($menu);

        $formule = new Formule();
        $formule->setTitre('Formule Complète');
        $formule->setDescription('Entrée + Plat + Dessert');
        $formule->setPrix(29.50);
        $formule->setMenu($menu);
        $manager->persist($formule);

        $formule = new Formule();
        $formule->setTitre('Formule Affaires');
        $formule->setDescription('Entrée + Plat ou Plat + Dessert');
        $formule->setPrix(24.50);
        $formule->setMenu($menu);
        $manager->persist($formule);

        $formule = new Formule();
        $formule->setTitre('Formule Affaires');
        $formule->setDescription('Entrée + Plat ou Plat + Dessert');
        $formule->setPrix(24.50);
        $formule->setMenu($menu);
        $manager->persist($formule);

        $formule = new Formule();
        $formule->setTitre('Formule Fruits de mer');
        $formule->setDescription('Plateau de fruits de mer + Dessert');
        $formule->setPrix(29.50);
        $formule->setMenu($menu);
        $manager->persist($formule);

        $formule = new Formule();
        $formule->setTitre('Formule Grand Large');
        $formule->setDescription('Soupe de poisson + choucroute de la mer + Dessert');
        $formule->setPrix(24.50);
        $formule->setMenu($menu);
        $manager->persist($formule);

        $plat = new Plat();
        $plat->setTitre('Rillettes de thon au poivre vert');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Craquant de Maroilles, salade verte et sa brunoise de pommes');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Craquant de Maroilles, salade verte et sa brunoise de pommes');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Asperges sauce gribiche et son œuf mollet');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Mousseline de poissons à la crème de tomates et fines herbes');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Cassolette d’escargots au beurre d’ail et ses croûtons');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);
        
        $plat = new Plat();
        $plat->setTitre('Soupe de poissons maison et sa garniture');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Tartare de bœuf maison');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(19.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Bûchette de filet mignon de porc à la crème d\'asperges vertes');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(19.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Suprême de poulet au Maroilles de Thiérache');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(19.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Bavette d’aloyau poêlée, sauce échalotes');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(19.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Choucroute de la mer aux trois poissons, petites pommes de terre et beure blanc');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(19.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Cassolette de moulesdécortiquées à la crème et ses frites');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(19.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Moelleux de chocolat, crème anglaise et amandes effilées');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Profiterole maison, glace vanille de bourbon, chocolat chaud et chantilly');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Crème brûlée aux Spéculoos');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Pavé flamand, crème glacée spéculoos, chicorée et son cœur meringué');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        $plat = new Plat();
        $plat->setTitre('Rocher glacé, crème glacée pralinée, vanille et croquant de chocolat');
        $plat->setDescription('Fait maison.');
        $plat->setPrix(7.00);
        $plat->setCategorie($categories);
        $plat->setFileImage('');
        $plat->setTitleImage('');
        $plat->setIsFavorite(false);
        $manager->persist($plat);

        for($i=0; $i<5; $i++){
            $reservation = new Reservation();
            $reservation->setVisiteurName($this->faker->name());
            $reservation->setVisiteurEmail($this->faker->email());
            $reservation->setVisiteurNbConvive($this->faker->numberBetween(1, 10));
            $reservation->setDate(new \DateTimeImmutable('2023-07-01'));
            $reservation->setHeure(12.15);
            $reservation->setCreatedAt(new \DateTimeImmutable('2021-05-14'));
            $manager->persist($reservation);
        }

        $manager->flush();
    }
}
