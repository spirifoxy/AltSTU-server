<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * degree
 *
 * @ORM\Table(name="degree")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DegreeRepository")
 */
class Degree
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="shortdegree", type="string", length=255, nullable=true)
     */
    private $shortdegree;

    /**
     * @var string
     *
     * @ORM\Column(name="longdegree", type="string", length=255, nullable=true)
     */
    private $longdegree;

    /**
     * @ORM\OneToMany(targetEntity="teacher", mappedBy="degree")
     */
    private $teachers;

    public function __construct() {
        $this->teachers = new ArrayCollection();
    }

    public function getTeachers() {
        return $this->teachers;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set shortdegree
     *
     * @param string $shortdegree
     *
     * @return Degree
     */
    public function setShortdegree($shortdegree)
    {
        $this->shortdegree = $shortdegree;

        return $this;
    }

    /**
     * Get shortdegree
     *
     * @return string
     */
    public function getShortdegree()
    {
        return $this->shortdegree;
    }

    /**
     * Set longdegree
     *
     * @param string $longdegree
     *
     * @return Degree
     */
    public function setLongdegree($longdegree)
    {
        $this->longdegree = $longdegree;

        return $this;
    }

    /**
     * Get longdegree
     *
     * @return string
     */
    public function getLongdegree()
    {
        return $this->longdegree;
    }
}

