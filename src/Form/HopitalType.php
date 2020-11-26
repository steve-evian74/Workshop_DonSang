<?php

namespace App\Form;

use App\Entity\Hopital;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HopitalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('EFS_Nom')
            ->add('EFS_Adresse')
            ->add('EFS_Zip')
            ->add('EFS_Ville')
            ->add('PosGeo')
            ->add('Qte_Globule_Rouge')
            ->add('Qte_plasma')
            ->add('Qte_Plaquettes')
            ->add('MinQteGlr')
            ->add('MinQtePLSA')
            ->add('MinQtePLAQ')
            ->add('FK_Patient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hopital::class,
        ]);
    }
}
