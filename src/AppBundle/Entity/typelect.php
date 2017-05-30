<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * typelect
 *
 * @ORM\Table(name="typelect")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\typelectRepository")
 */
class typelect
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
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="timetable", mappedBy="typelect")
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
     * @param integer $type
     *
     * @return typelect
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }
}

