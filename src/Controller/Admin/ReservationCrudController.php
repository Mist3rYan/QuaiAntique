<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Time;
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
        ->setTimezone('Europe/Paris');;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('visiteur_email','Email'),
            TextField::new('visiteur_name','Nom'),
            IntegerField::new('visiteur_nb_convive','Nombre de convives'),
            DateField::new('date','Date de réservation')->setFormat('dd-MM-yyyy'),
            TimeField::new('heure','Heure de réservation'),
            DateField::new('created_at','Date de création')->setFormat('dd-MM-yyyy'),
            ArrayField::new('visiteur_allergene','Allergie'),
        ];
    }
}
