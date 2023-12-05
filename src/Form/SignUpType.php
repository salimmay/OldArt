<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class SignUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                "label" => "Nom d'utilisateur", 
                "label_attr" => ["class"=> "fs-14 text-black fw-medium lh-18"],
                "attr" => ["class" => "form-control form--control", "plaeholder"=>"Votre nom d'utilisateur"]
            ])
            ->add('email', null, [
                "label" => "Votre email", 
                "label_attr" => ["class"=> "fs-14 text-black fw-medium lh-18"],
                "attr" => ["class" => "form-control form--control", "plaeholder"=>"Votre email"]
            ])
            //->add('roles')
            ->add('password', PasswordType::class, [
                "label" => "Mot de passe", 
                "label_attr" => ["class"=> "fs-14 text-black fw-medium lh-18"],
                "attr" => ["class" => "form-control form--control", "plaeholder"=>"Votre mot de passe"]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
