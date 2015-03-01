<?php

// src/Acl/ClassifiedBundle/Entity/Department.php
namespace Acl\ClassifiedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity()
 * @ORM\Table(name="department")
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="department")
     */
    private $instructors;

    /**
     * @ORM\OneToMany(targetEntity="Course", mappedBy="department")
     */
    private $courses;

    public function __construct()
    {
        $this->instructors = new ArrayCollection();
        $this->courses = new ArrayCollection();
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
     * @param \Acl\ClassifiedBundle\Entity\User $instructor
     * @return $this
     */
    public function addInstructor($instructor)
    {
        $this->instructors[] = $instructor;
        return $this;
    }

    /**
     * @param \Acl\ClassifiedBundle\Entity\User $instructor
     */
    public function removeInstructor($instructor)
    {
        $this->instructors->removeElement($instructor);
    }

    /**
     * Get instructors
     * @return Collection
     */
    public function getInstructors()
    {
        return $this->instructors;
    }

    /**
     * @param \Acl\ClassifiedBundle\Entity\Course $course
     * @return $this
     */
    public function addCourse($course)
    {
        $this->courses[] = $course;
        return $this;
    }

    /**
     * @param \Acl\ClassifiedBundle\Entity\Course $course
     */
    public function removeCourse($course)
    {
        $this->courses->removeElement($course);
    }

    /**
     * Get courses
     * @return Collection
     */
    public function getCourses()
    {
        return $this->courses;
    }

}
