<?php

namespace App\Form;

use App\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfferFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('price', null, [
                "label" => "offered Price",
                "label_attr" => ["class" => "fs-20 text-black fw-medium mb-0"],
                
                "help_attr" => ["class" => "fs-13 pb-3 lh-20"],
                "attr" => ["class" => "form-control form--control", "placeholder" => "exp:200DT"]
            ])
            ->add('description',null,[
                "label" => "why do you need this instrument ",
                "label_attr" => ["class" => "fs-20 text-black fw-medium mb-0"],
                "attr" => ["class" => "form-control form--control user-text-editor", "rows" => 10, "cols" => 40]
            ])
            //->add('createdAt')
            ->add('contact', null, [
                "label" => "your contact",
                "label_attr" => ["class" => "fs-20 text-black fw-medium mb-0"],
                
                "help" => "make sure to put the complete name of the instrument(brand..)",
                "attr" => ["class" => "form-control form--control", "placeholder" => "mail/phone number"]
            ])
            
            
            //->add('instrument')
            //->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
