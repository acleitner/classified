<?php
// src/Acl/ClassifiedBundle/Form/Type/RegistrationFormType.php
namespace Acl\ClassifiedBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
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
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                $formOptions = array(
                    'class' => 'Acl\ClassifiedBundle\Entity\Role',
                    'property' => 'name'
                );

                $form->add('roles', 'entity', $formOptions);
            }
        );
        $builder->add('Register', 'submit');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acl\ClassifiedBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'registration';
    }
}
