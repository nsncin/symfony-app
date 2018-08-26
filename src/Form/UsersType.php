<?php
// src/Form/UserType.php
namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,array('attr'=> array(
                'class'=> 'form-control',
                'autocomplete'=> 'off',
                'placeholder'=> 'Enter Email'
            )))
            ->add('username', TextType::class,array('attr'=> array(
                'class'=> 'form-control',
                'autocomplete'=> 'off',
                'placeholder'=> 'Enter Username'
            )))
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('attr' => array('class' => 'form-control')),
                'first_options'  => array('label'=> 'Enter Password','attr'=>array( 'class' => 'form-control','placeholder'=> 'Enter Password')),
                'second_options' => array('label'=> 'Repeat Password','attr'=>array('class' => 'form-control', 'placeholder'=> 'Repeat Password'))
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Users::class,
        ));
    }
}