<?php

namespace Acl\ClassifiedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Acl\ClassifiedBundle\Form\Type\RegistrationFormType;
use Acl\ClassifiedBundle\Entity\User;

class AccountController extends Controller
{

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationFormType(), new User());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $user = $form->getData();
            $user->addRole($role);
            $encoder = $this->get('security.encoder_factory')->getEncoder($user);
            $user->setPassword($encoder->encodePassword($user->getPlainPassword(), $user->getSalt()));
            $user->setPlainPassword(null);
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('register_success'));
        }

        return $this->render(
            'AclClassifiedBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }

    public function registerAction()
    {
        $user = new User();
        $form = $this->createForm(new RegistrationFormType(), $user, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'AclClassifiedBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
}
