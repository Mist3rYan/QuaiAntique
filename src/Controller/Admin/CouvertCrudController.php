<?php

namespace App\Controller\Admin;

use App\Entity\Couvert;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class CouvertCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Couvert::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInplural('Couverts')
            ->setEntityLabelInSingular('Couvert');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('nb_couvert', 'Nombre de couverts'),
        ];
    }
}
