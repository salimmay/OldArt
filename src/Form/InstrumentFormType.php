<?php

namespace App\Form;

use App\Entity\Instrument;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InstrumentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                "label" => "Name Of The Instrument",
                "label_attr" => ["class" => "fs-20 text-black fw-medium mb-0"],
                
                "help" => "make sure to put the complete name of the instrument(brand..)",
                "attr" => ["class" => "form-control form--control", "placeholder" => "exp:piano"]
            ])
            //->add('postedAt')
            ->add('price', null, [
                "label" => "Demanded Price",
                "label_attr" => ["class" => "fs-20 text-black fw-medium mb-0"],
                
                "help_attr" => ["class" => "fs-13 pb-3 lh-20"],
                "attr" => ["class" => "form-control form--control", "placeholder" => "exp:200DT"]
            ])
            ->add('description',null,[
                "label" => "Decription of the intstrument",
                "label_attr" => ["class" => "fs-20 text-black fw-medium mb-0"],
                "attr" => ["class" => "form-control form--control user-text-editor", "rows" => 10, "cols" => 40]
            ])
            ->add("submit", SubmitType::class, [
                "label" => "submit",
                "attr" =>["class" => "btn theme-btn"]
            ])
            //->add('quality')
            //->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Instrument::class,
        ]);
    }
}
