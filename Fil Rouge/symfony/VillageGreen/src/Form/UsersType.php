<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('useLastname')
            ->add('useFirstname')
            ->add('useAddress')
            ->add('useZipcode')
            ->add('useCity')
            ->add('useMail', EmailType::class)
            ->add('usePhone')
            ->add('usePassword', PasswordType::class)
            ->add('confirm_password', PasswordType::class)
            ->add('useCou')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
