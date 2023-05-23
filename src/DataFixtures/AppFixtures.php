<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use App\Entity\Produit;
use Faker\Generator;
use Faker\Factory;
use App\Entity\Couvert;
use App\Entity\Formule;
use App\Entity\Allergene;
use App\Entity\Categorie;
use App\Entity\Calendrier;
use App\Entity\Reservation;
use App\Entity\User;
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
        $allergie = ['Gluten', 'Crustacés', 'Oeufs', 'Poissons', 'Arachides', 'Soja', 'Lait', 'Fruits à coque', 'Céleri', 'Moutarde', 'Graines de sésame', 'Sulfites', 'Lupin', 'Mollusques'];
        $categories = ['Entrée', 'Plat', 'Dessert', 'Boisson'];

        foreach ($jours as $jour) {
            $calendrier = new Calendrier();
            $calendrier->setJour($jour);
            if($jour ===  'Lundi'){
                $calendrier->setOMidi(null);
                $calendrier->setFMidi(null);
            }
            else{
                $heure = new \DateTime('@'.strtotime('12:00'));
                $calendrier->setOMidi($heure);
                $heure = new \DateTime('@'.strtotime('14:00'));
                $calendrier->setFMidi($heure);
            }
            $heure = new \DateTime('@'.strtotime('19:00'));
            $calendrier->setOSoir($heure);
            if($jour === 'Samedi'){
                $heure = new \DateTime('@'.strtotime('23:00'));
                $calendrier->setFSoir($heure);
            }
            else{
                $heure = new \DateTime('@'.strtotime('22:00'));
                $calendrier->setFSoir($heure);
            }
            if($jour === 'Dimanche'){
                $calendrier->setIsOpen(false);
            }
            else{
                $calendrier->setIsOpen(true);
            }
            $manager->persist($calendrier);
        }

        foreach ($allergie as $allergene) {
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
        $formule->setTitre('Formule Enfants -10 ans');
        $formule->setDescription('Plat + Dessert version enfant');
        $formule->setPrix(10.95);
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

        $produit = new Produit();
        $produit->setTitre('Rillettes de thon au poivre vert');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Craquant de Maroilles, salade verte et sa brunoise de pommes');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Craquant de Maroilles, salade verte et sa brunoise de pommes');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Asperges sauce gribiche et son œuf mollet');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Mousseline de poissons à la crème de tomates et fines herbes');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Cassolette d’escargots au beurre d’ail et ses croûtons');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);
        
        $produit = new Produit();
        $produit->setTitre('Soupe de poissons maison et sa garniture');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Tartare de bœuf maison');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(19.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Bûchette de filet mignon de porc à la crème d\'asperges vertes');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(19.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Suprême de poulet au Maroilles de Thiérache');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(19.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Bavette d’aloyau poêlée, sauce échalotes');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(19.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Choucroute de la mer aux trois poissons, petites pommes de terre et beure blanc');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(19.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Cassolette de moulesdécortiquées à la crème et ses frites');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(19.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Moelleux de chocolat, crème anglaise et amandes effilées');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Profiterole maison, glace vanille de bourbon, chocolat chaud et chantilly');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Crème brûlée aux Spéculoos');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Pavé flamand, crème glacée spéculoos, chicorée et son cœur meringué');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setTitre('Rocher glacé, crème glacée pralinée, vanille et croquant de chocolat');
        $produit->setDescription('Fait maison.');
        $produit->setPrix(7.00);
        $produit->setCategorie($categories);
        $produit->setFileImage('placeholder.jpg');
        $produit->setTitleImage('');
        $produit->setIsFavorite(false);
        $manager->persist($produit);

        for($i=0; $i<5; $i++){
            $reservation = new Reservation();
            $reservation->setVisiteurName($this->faker->name());
            $reservation->setVisiteurEmail($this->faker->email());
            $reservation->setVisiteurNbConvive($this->faker->numberBetween(1, 10));
            $reservation->setDate(new \DateTime());
            $reservation->setHeure(new \DateTime('2023-07-01 12:15')); 
            $manager->persist($reservation);
        }

        for($i=0; $i<5; $i++){
            $user = new User();
            $user->setNom($this->faker->name());
            $user->setEmail($this->faker->email());
            $user->setRoles(['ROLE_USER']);
            $user->setPlainPassword('password'); // 'password
            $manager->persist($user);
        }
        $user = new User();
        $user->setNom('admin');
        $user->setEmail('admin@quaiantique.fr');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPlainPassword('password'); // 'password

        $manager->persist($user);

        $manager->flush();
    }
}
