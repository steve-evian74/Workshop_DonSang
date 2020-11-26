<?php

namespace App\Form;

use App\Entity\Collecte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollecteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom_Collecte')
            ->add('Date_Collecte')
            ->add('Globule_Rouge')
            ->add('Quantite_GRouge')
            ->add('Plaquette')
            ->add('Quantite_Plaquette')
            ->add('Plasma')
            ->add('Quantite_Plas')
            ->add('Fk_Utilisateur')
            ->add('Fk_Hopital')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Collecte::class,
        ]);
    }
}
