<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('email', EmailType::class, array(
            'label' => 'Email'
        ))
        ->add('nick_name', TextType::class, array(
            'label' => 'Nick Name'
        ))
        ->add('password', PasswordType::class, array(
            'label' => 'Password'
        ))
        ->add('name', TextType::class, array(
            'label' => 'Name'
        ))
        ->add('last_name', TextType::class, array(
            'label' => 'Last Name'
        ))
        ->add('submit', SubmitType::class, array(
            'label' => 'Register'
        ))
        ;
    } 

}

?>