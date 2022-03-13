<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          
            // ->add('roles')
             ->add('name',TextType::class,[
                 'attr' => ['class' => 'form-input']
             ])
             ->add('age',NumberType::class,[
                'attr' => ['class' => 'form-input']
            ])
             ->add('sexe', ChoiceType::class,[
                 'choices' => [
                     'homme' => "Homme",
                     'femme' => "Femme",
                 ],
             ])
             ->add('composition',NumberType::class,[
                'attr' => ['class' => 'form-input']
            ])
           //  ->add('level')
           //  ->add('progression')
             //->add('recompense')
             ->add('location',TextType::class,[
                'attr' => ['class' => 'form-input']
            ])
             ->add('logement',ChoiceType::class,[
                'choices' => [
                    'Appartement' => "Appartement",
                    'Maison' => "Maison",
                ],
            ])
            // ->add('subscribedate')
            ->add('email',EmailType::class,[
                'attr' => ['class' => 'form-input']
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => ['attr' => ['class' => 'form-input']],
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Repeter votre mot de passe'],
                'invalid_message' => 'Les 2 mots de passe doivent etre identique'
            ]);
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
