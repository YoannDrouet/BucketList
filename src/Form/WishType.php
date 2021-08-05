<?php

namespace App\Form;

use App\Entity\Wish;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', null, ['required'=>false])
            ->add('title', null, ['required'=>false])
            ->add('description')
            ->add('dateCreated', DateType::class,
                ['html5'=>true, 'widget'=>'single_text', 'required'=>false, 'empty_data'=>null, 'invalid_message'=>'Renseignez une date'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Wish::class,
        ]);
    }
}
