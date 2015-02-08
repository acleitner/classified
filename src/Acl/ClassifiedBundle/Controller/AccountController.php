<?php

namespace Acl\ClassifiedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Acl\ClassifiedBundle\Form\Type\RegistrationType;
use Acl\ClassifiedBundle\Form\Model\Registration;

class AccountController extends Controller
{

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new RegistrationType(), new Registration());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $registration = $form->getData();

            $user = $registration->getUser();
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
        $registration = new Registration();
        $form = $this->createForm(new RegistrationType(), $registration, array(
            'action' => $this->generateUrl('account_create'),
        ));

        return $this->render(
            'AclClassifiedBundle:Account:register.html.twig',
            array('form' => $form->createView())
        );
    }
}
