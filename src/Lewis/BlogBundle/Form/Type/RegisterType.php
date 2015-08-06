<?php

namespace Lewis\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class RegisterType extends AbstractType {
    public function getName() {
        return 'register_form';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', 'text', array(
                    'label' => 'Imię i nazwisko',
                    'constraints' => array(
                        new Assert\NotBlank(),
                        new Assert\Regex(array(
                            'pattern' => '/^[a-zA-Z]+ [a-zA-Z]+$/',
                            'message' => 'Musisz podać imię i nazwisko'
                        ))
                    )
                ))
                ->add('email','email', array(
                    'label' => 'Email',
                    'constraints' => array(
                        new Assert\NotBlank(),
                        new Assert\Email()
                    )
                ))
                ->add('password','repeated',array(
                    'type' => 'password',
                    'options' => array('attr' => array('class' => 'password-field')),
                    'required' => true,
                    'first_options'  => array('label' => 'Hasło'),
                    'second_options' => array('label' => 'Powtórz hasło'),
                    'constraints' => array(
                        new Assert\NotBlank(),
                        new Assert\Regex(array(
                            'pattern' => '/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})$/',
                            'message' => 'Hasło musi zawierać od 6 do 20 znajów oraz przynajmniej jedną małą i dużą literę oraz cyfrę'
                        ))
                    )
                    
                ))
                ->add('sex', 'choice', array(
                    'label' => 'Płeć',
                    'choices' => array(
                        'm' => 'Mężczyzna',
                        'k' => 'Kobieta'
                    ),
                    'expanded' => 'true',
                    'constraints' => array(
                        new Assert\Choice(array(
                            'choices' => array('m','k'),
                            'message' => 'Płeć'
                        ))
                    )
                ))
                ->add('birthdate','date', array(
                    'label' => 'Data urodzenia',
                    
                    'empty_value' => '--',
                    'empty_data' => NULL,
                    'constraints' => array(
                        new Assert\Date()
                    )
                ))
                ->add('save', 'submit', array(
                    'label'=>'Zapisz'
                ));
    }
    
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
           'data_class' => 'Lewis\BlogBundle\Entity\Register'
        ));
    }
}
