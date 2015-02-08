<?php

namespace Acl\ClassifiedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class TimetableController extends Controller
{
    public function viewTimetableAction()
    {
      return $this->render('AclClassifiedBundle:Timetable:viewTimetable.html.twig', array());
    }

}
