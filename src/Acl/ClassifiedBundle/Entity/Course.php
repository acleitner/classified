<?php

// src/Acl/ClassifiedBundle/Entity/Course.php
namespace Acl\ClassifiedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="course")
 */
class Course
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="courses")
     */
    private $instructor;

    /**
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="courses")
     */
    private $department;

    public function __construct()
    {
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateTimestamps()
    {
        $this->setUpdatedAt(new \DateTime('now'));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created_at
     * @param \DateTime $createdAt
     * @return string
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
        return $this;
    }

    /**
     * Get created_at
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     * @param \DateTime $updatedAt
     * @return string
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
        return $this;
    }

    /**
     * Get updated_at
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set name
     * @param string $name
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * set description
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * get description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * set instructor
     * @param \Acl\ClassifiedBundle\Entity\User $instructor
     * @return $this
     */
    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
        return $this;
    }

    /**
     * Get instructor
     * @return \Acl\ClassifiedBundle\Entity\User
     */
    public function getInstructor()
    {
        return $this->instructor;
    }


    /**
     * set department
     * @param \Acl\ClassifiedBundle\Entity\Department $department
     * @return $this
     */
    public function setDepartment($department)
    {
        $this->department = $department;
        return $this;
    }

    /**
     * Get department
     * @return \Acl\ClassifiedBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->instructor;
    }
}
