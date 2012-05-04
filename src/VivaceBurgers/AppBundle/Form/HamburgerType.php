<?php

namespace VivaceBurgers\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class HamburgerType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description', 'textarea')
            ->add('price')
        ;
    }

    public function getName()
    {
        return 'vivaceburgers_appbundle_hamburgertype';
    }
}
