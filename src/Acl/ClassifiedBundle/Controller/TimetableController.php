<?php

namespace Acl\ClassifiedBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TimetableController extends Controller
{
    public function indexAction()
    {
      return $this->render('AclClassifiedBundle:Timetable:index.html.twig', array());
    }

    public function showAction()
    {
      return $this->render('AclClassifiedBundle:Timetable:show.html.twig', array());
    }

    public function newAction()
    {
      $timetable = new TimeTable();
      $form
      return $this->render('AclClassifiedBundle:Timetable:new.html.twig', array(
          $
      ));
    }

    public function editAction()
    {
      return $this->render('AclClassifiedBundle:Timetable:edit.html.twig', array());
    }

    public function createAction()
    {
      return $this->render('AclClassifiedBundle:Timetable:create.html.twig', array());
    }


}
