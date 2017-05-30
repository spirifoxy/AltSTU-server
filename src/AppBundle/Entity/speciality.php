<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * speciality
 *
 * @ORM\Table(name="speciality")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\specialityRepository")
 */
class speciality
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
     * @ORM\Column(name="shortspeciality", type="string", length=255)
     */
    private $shortspeciality;

    /**
     * @var string
     *
     * @ORM\Column(name="longspeciality", type="string", length=255, nullable=true)
     */
    private $longspeciality;

    /**
     * @ORM\OneToMany(targetEntity="group", mappedBy="speciality")
     */
    private $groups;

    public function __construct() {
        $this->groups = new ArrayCollection();
    }

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
     * Set shortspeciality
     *
     * @param string $shortspeciality
     *
     * @return speciality
     */
    public function setShortspeciality($shortspeciality)
    {
        $this->shortspeciality = $shortspeciality;

        return $this;
    }

    /**
     * Get shortspeciality
     *
     * @return string
     */
    public function getShortspeciality()
    {
        return $this->shortspeciality;
    }

    /**
     * Set longspeciality
     *
     * @param string $longspeciality
     *
     * @return speciality
     */
    public function setLongspeciality($longspeciality)
    {
        $this->longspeciality = $longspeciality;

        return $this;
    }

    /**
     * Get longspeciality
     *
     * @return string
     */
    public function getLongspeciality()
    {
        return $this->longspeciality;
    }
}

