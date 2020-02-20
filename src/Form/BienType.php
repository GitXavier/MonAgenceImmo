<?php

namespace App\Form;

use App\Entity\Bien;
use App\Entity\TypeDeBien;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class BienType
 * @package App\Form
 */
class BienType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
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
            ->add('typeDeBienId')/*, EntityType::class,[
                'class' => TypeDeBien::class,
                'label' => 'typeDeBien'
            ])*/
            ->add('prix')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
