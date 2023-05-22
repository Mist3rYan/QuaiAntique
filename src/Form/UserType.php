<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Allergene;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add(
            'nom',
            TextType::class,
            [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 5,
                    'maxlength' => 180,
                ],
                'invalid_message' => 'Le nom n\'a pas la bonne longueur',
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length([
                        'min' => 5,
                        'max' => 180,
                    ]),
                ],
            ]
        )
            ->add('nombre_convive', IntegerType::class, [
                'label' => 'Nombre de convive',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 10,
                    'step' => 1
                ]
            ])
            ->add('allergenes', EntityType::class, [
                'class' => Allergene::class,
                'choice_label' => 'nom',
                'choice_value' => 'id',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Allergènes',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Modifier',
                'attr' => [
                    'class' => 'btn btnNavbar mt-4'
                ],
            ])
            ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
