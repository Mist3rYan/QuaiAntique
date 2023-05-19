<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Validator\Constraints\Choice;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class PlatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plat::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInplural('Produits')
            ->setEntityLabelInSingular('Produit');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextField::new('description'),
            MoneyField::new('prix')->setCurrency('EUR')->setStoredAsCents(false),
            TextField::new('file_image', 'Lien de l\'image'),
            TextField::new('title_image', 'Titre de l\'image'),
            BooleanField::new('is_favorite','A l\'affiche'),
        ];
    }
}
