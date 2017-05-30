<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * typelesson
 *
 * @ORM\Table(name="typelesson")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypelessonRepository")
 */
class Typelesson
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="typeshort", type="string", length=255)
     */
    private $typeshort;

    /**
     * @ORM\OneToMany(targetEntity="Timetable", mappedBy="typelesson")
     */
    private $timetables;

    public function __construct() {
        $this->timetables = new ArrayCollection();
    }

    public function getTimetables() {
        return $this->timetables;
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
     * Set type
     *
     * @param string $type
     *
     * @return Typelesson
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set typeshort
     *
     * @param string $typeshort
     *
     * @return Typelesson
     */
    public function setTypeshort($typeshort)
    {
        $this->typeshort = $typeshort;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getTypeshort()
    {
        return $this->typeshort;
    }
}

