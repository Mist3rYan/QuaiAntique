<?php

namespace App\Controller\Admin;

use App\Entity\Calendrier;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CalendrierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Calendrier::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInplural('Horaires')
        ->setEntityLabelInSingular('Horaire')
        ->setTimeFormat('HH:mm')
        ->setTimezone('Europe/Paris');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('jour')->hideWhenUpdating(),
            TimeField::new('o_midi','Ouverture midi'),
            TimeField::new('f_midi','Fermeture midi'),
            TimeField::new('o_soir','Ouverture soir'),
            TimeField::new('f_soir','Fermeture soir'),
            BooleanField::new('is_open'),
        ];
    }
}
