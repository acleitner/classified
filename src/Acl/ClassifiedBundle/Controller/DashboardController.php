<?php

namespace Acl\ClassifiedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('AclClassifiedBundle:Dashboard:index.html.twig', array());
    }
}
