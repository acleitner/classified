<?php

namespace Simple\ProfileBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Acl\ClassifiedBundle\Entity\Role;

class LoadRoleData implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        var_dump('getting container here');
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
      $adminRole = new Role();
      $adminRole->setName('admin');
      $adminRole->setRole('ROLE_ADMIN');
      $manager->persist($adminRole);

      $userRole = new Role();
      $userRole->setName('user');
      $userRole->setRole('ROLE_USER');
      $manager->persist($userRole);


      $manager->flush();
    }
}
