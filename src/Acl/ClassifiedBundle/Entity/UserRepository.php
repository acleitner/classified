<?php

// src/Acl/Classified/Entity/UserRepository.php
namespace Acl\ClassifiedBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class UserRepository extends EntityRepository implements UserProviderInterface
{
    public function loadUserByUsername($email)
    {
        $q = $this
            ->createQueryBuilder('u')
            ->select('u, r')
            ->leftJoin('u.roles', 'r')
            ->where('u.email = :email')
            ->setParameter('email', $email)
            ->getQuery();

        try {
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf(
              'Unable to find a User AclClassifiedBundle:User object identified by "%s".',
              $email
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    $class
                )
            );
        }

        return $this->find($user->getId());
    }

    public function supportsClass($class)
    {
        return $this->getEntityName() === $class
            || is_subclass_of($class, $this->getEntityName());
    }
}
