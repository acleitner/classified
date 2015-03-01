<?php

// src/Acl/ClassifiedBundle/Entity/Role.php
namespace Acl\ClassifiedBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="role")
 * @ORM\Entity()
 */
class Role implements RoleInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="string", length=32, name="name")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="roles")
     *
     */
    private $users;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime('now'));
        $this->users = new ArrayCollection();
    }

    /**
     * Set created_at
     * @param \DateTime $createdAt
     * @return string
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get created_at
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @see RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Add users
     *
     * @param \Acl\ClassifiedBundle\Entity\User $users
     * @return Role
     */
    public function addUser(\Acl\ClassifiedBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Acl\ClassifiedBundle\Entity\User $users
     */
    public function removeUser(\Acl\ClassifiedBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        return serialize(array(
            $this->id.
            $this->name,
            $this->createdAt
        ));
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->name,
            $this->createdAt
        ) = unserialize($serialized);
    }
}
