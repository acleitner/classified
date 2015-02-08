<?php
// src/Acl/CLassifiedBundle/Form/Model/Registration.php
namespace Acl\ClassifiedBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use Acl\ClassifiedBundle\Entity\User;

class Registration
{
    /**
     * @Assert\Type(type="Acl\ClassifiedBundle\Entity\User")
     * @Assert\Valid()
     */
    protected $user;

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}
