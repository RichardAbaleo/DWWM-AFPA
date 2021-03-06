<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Users1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('useLastname')
            ->add('useFirstname')
            ->add('useAddress')
            ->add('useZipcode')
            ->add('useCity')
            ->add('useMail')
            ->add('usePhone')
            ->add('usePassword')
            ->add('useCou')
            ->add('useCom')
            ->add('useTyp')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
