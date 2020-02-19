<?php

namespace App\Form;

use App\Entity\Bien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('proprietaire')
            ->add('locataire')
            ->add('transactionId')
            ->add('surface')
            ->add('optionId')
            ->add('pieceId')
            ->add('chauffageId')
            ->add('exposition')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('altitude')
            ->add('longitude')
            ->add('proximiteId')
            ->add('typeDeBienId')
            ->add('prix')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
