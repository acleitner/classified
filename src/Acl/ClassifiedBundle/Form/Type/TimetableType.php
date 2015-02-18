<?php
// src/Acl/ClassifiedBundle/Form/Type/UserType.php
namespace Acl\ClassifiedBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName', 'text');
        $builder->add('lastName', 'text');
        $builder->add('email', 'email');
        $builder->add('plainPassword', 'repeated', array(
            'first_name'  => 'password',
            'second_name' => 'confirm_password',
            'type' => 'password'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acl\ClassifiedBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'user';
    }
}
