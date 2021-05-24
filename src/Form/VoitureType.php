<?php

namespace App\Form;

use App\Entity\Modele;
use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('immatriculation', TextType::class, [
                'attr' => ['placeholder' => 'Le champ doit contenir au-moins un nombre entier',
                
            ],
                
            ])
            ->add('nbPortes', IntegerType::class, [
                'attr' => ['placeholder' => 'Vous avez le choix entre 2 et 5 portes']
            ])
            ->add('annee', IntegerType::class, [
                'attr' => ['placeholder' => 'Vous devez choisir entre 1990 et 2020']
            ])
            ->add('modele', EntityType::class, [
                'class' => Modele::class,
                'choice_label' => 'libelle',
            ])
            ->add('Valider', SubmitType::class, [
                'attr' => [
                    'class' => 'container-fluid mt-2 btn btn-success'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
