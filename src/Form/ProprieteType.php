<?php

namespace App\Form;

use App\Entity\Critere;
use App\Entity\Propriete;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProprieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('surface')
            ->add('pieces')
            ->add('chambres')
            ->add('etages')
            ->add('chauffage')
            ->add('criteres', EntityType::class, [
                'class' => Critere::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
            ->add('prix')
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
            ->add('vendu')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Propriete::class,
        ]);
    }
}
