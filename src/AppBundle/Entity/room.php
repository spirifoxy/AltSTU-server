<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * toom
 *
 * @ORM\Table(name="toom")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\toomRepository")
 */
class room
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
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer", nullable=true)
     */
    private $capacity;

    /**
     * @ORM\ManyToOne(targetEntity="roomtype",inversedBy="roomtypes")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $roomtype;

    /**
     * @ORM\ManyToOne(targetEntity="building",inversedBy="buildings")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $building;

    /**
     * @ORM\OneToMany(targetEntity="timetable", mappedBy="room")
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
     * Set number
     *
     * @param string $number
     *
     * @return toom
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return toom
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }
}

