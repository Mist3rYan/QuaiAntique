<?php

namespace App\Controller\Admin;

use App\Entity\Formule;
use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class FormuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formule::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInplural('Formules')
        ->setEntityLabelInSingular('Formule');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextField::new('description'),
            MoneyField::new('prix')->setCurrency('EUR')->setStoredAsCents(false),
            AssociationField::new('menu')->setCrudController(Menu::class)
        ];
    }
}
