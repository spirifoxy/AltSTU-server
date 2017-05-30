<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * faculty
 *
 * @ORM\Table(name="faculty")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\facultyRepository")
 */
class faculty
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
     * @ORM\Column(name="fullname", type="string", length=255)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="shortname", type="string", length=255)
     */
    private $shortname;

    /**
     * @ORM\OneToMany(targetEntity="subfaculty", mappedBy="faculty")
     */
    private $subfaculties;

    public function __construct() {
        $this->subfaculties = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    public function getSubfaculties() {
        return $this->subfaculties;
    }

    /**
     * @ORM\OneToMany(targetEntity="group", mappedBy="faculty")
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
     * Set fullname
     *
     * @param string $fullname
     *
     * @return faculty
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set shortname
     *
     * @param string $shortname
     *
     * @return faculty
     */
    public function setShortname($shortname)
    {
        $this->shortname = $shortname;

        return $this;
    }

    /**
     * Get shortname
     *
     * @return string
     */
    public function getShortname()
    {
        return $this->shortname;
    }
}

