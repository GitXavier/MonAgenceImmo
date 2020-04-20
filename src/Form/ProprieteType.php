<?php

namespace App\Form;

use App\Entity\Critere;
use App\Entity\Propriete;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProprieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description',CKEditorType::class)
            ->add('surface')
            ->add('pieces')
            ->add('chambres')
            ->add('etages')
            ->add('chauffage')
            ->add('criteres', EntityType::class, [
                'class' => Critere::class,
                'required' => false,
                'choice_label' => 'name',
                'multiple' => true
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
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
