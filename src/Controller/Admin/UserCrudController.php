<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Faker\Provider\ar_EG\Text;
use Symfony\Component\Security\Core\Role\Role;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInplural('Clients')
            ->setEntityLabelInSingular('Client');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            TextField::new('nom'),
            TextField::new('email'),
            IntegerField::new('nombre_convive', 'Nombre de convive habituel')->setEmptyData('0'),
            ArrayField::new('allergenes', 'Allergie')->setEmptyData('Aucune allergie'),
            DateField::new('created_at', 'Date de création')->setFormat('dd-MM-yyyy')->hideWhenUpdating(),
        ];
    }
}
