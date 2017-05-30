<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * subfaculty
 *
 * @ORM\Table(name="subfaculty")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\subfacultyRepository")
 */
class subfaculty
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
     * @ORM\Column(name="shortsubfaculty", type="string", length=255)
     */
    private $shortsubfaculty;

    /**
     * @var string
     *
     * @ORM\Column(name="longsubfaculty", type="string", length=255)
     */
    private $longsubfaculty;

    /**
     * @var bool
     *
     * @ORM\Column(name="isexist", type="boolean")
     */
    private $isexist;

    /**
     * @var int
     *
     * @ORM\Column(name="idboss", type="integer", nullable=true)
     */
    private $idboss;

    /**
     * @ORM\ManyToOne(targetEntity="faculty",inversedBy="subfaculties")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $faculty;

    /**
     * @ORM\OneToMany(targetEntity="teacher", mappedBy="subfaculty")
     */
    private $teachers;

    public function __construct() {
        $this->teachers = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    public function getTeachers() {
        return $this->teachers;
    }

    /**
     * @ORM\OneToMany(targetEntity="group", mappedBy="subfaculty")
     */
    private $groups;

    public function getGroups() {
        return $this->groups;
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
     * Set shortsubfaculty
     *
     * @param string $shortsubfaculty
     *
     * @return subfaculty
     */
    public function setShortsubfaculty($shortsubfaculty)
    {
        $this->shortsubfaculty = $shortsubfaculty;

        return $this;
    }

    /**
     * Get shortsubfaculty
     *
     * @return string
     */
    public function getShortsubfaculty()
    {
        return $this->shortsubfaculty;
    }

    /**
     * Set longsubfaculty
     *
     * @param string $longsubfaculty
     *
     * @return subfaculty
     */
    public function setLongsubfaculty($longsubfaculty)
    {
        $this->longsubfaculty = $longsubfaculty;

        return $this;
    }

    /**
     * Get longsubfaculty
     *
     * @return string
     */
    public function getLongsubfaculty()
    {
        return $this->longsubfaculty;
    }

    /**
     * Set isexist
     *
     * @param boolean $isexist
     *
     * @return subfaculty
     */
    public function setIsexist($isexist)
    {
        $this->isexist = $isexist;

        return $this;
    }

    /**
     * Get isexist
     *
     * @return bool
     */
    public function getIsexist()
    {
        return $this->isexist;
    }

    /**
     * Set idboss
     *
     * @param integer $idboss
     *
     * @return subfaculty
     */
    public function setIdboss($idboss)
    {
        $this->idboss = $idboss;

        return $this;
    }

    /**
     * Get idboss
     *
     * @return int
     */
    public function getIdboss()
    {
        return $this->idboss;
    }
}

