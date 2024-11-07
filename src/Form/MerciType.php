<?php

namespace App\Form;

use App\Entity\Merci;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MerciType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('De', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'label' => 'De',
            ])
            ->add('A', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'label' => 'A',
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
            ])
            ->add('date', DateTimeType::class, [
                'widget' => 'single_text',
                'data' => new \DateTimeImmutable(),
                'label' => 'Date',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Merci::class,
        ]);
    }
}
