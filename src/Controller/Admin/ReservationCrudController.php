<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::EDIT);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInplural('Réservations')
        ->setEntityLabelInSingular('Réservation')
        ->setTimeFormat('HH:mm')
        ->setTimezone('UTC')
        ->setDefaultSort(['date' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date','Date de réservation')->setFormat('dd-MM-yyyy'),
            TimeField::new('heure','Heure de réservation'),
            TextField::new('visiteur_name','Nom'),
            TextField::new('visiteur_email','Email'),
            IntegerField::new('visiteur_nb_convive','Nombre de convives'),
            ArrayField::new('allergenes','Allergie'),
            DateField::new('created_at','Date de création')->setFormat('dd-MM-yyyy'),
        ];
    }
}
