<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('User_Nom')
            ->add('User_Prenom')
            ->add('User_Phone')
            ->add('User_Adresse')
            ->add('User_Ville')
            ->add('User_Password')
            ->add('User_Email')
            ->add('User_GroupSang')
            ->add('Fk_Patient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
