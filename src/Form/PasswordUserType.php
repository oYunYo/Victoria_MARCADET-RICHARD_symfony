<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PasswordUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //TODO : la contrainte doit gérer les exigeances de sécurité du mdp
        $builder
            ->add('password', PasswordType::class, [
                'label'=>'Mot de passe',
                'constraints' => [

                ]
            ])
            ->add('save', SubmitType::class, ['label' => 'Valider'])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
