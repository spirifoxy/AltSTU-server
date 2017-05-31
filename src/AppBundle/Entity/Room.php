<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoomRepository")
 */
class Room
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
     * @ORM\ManyToOne(targetEntity="Roomtype",inversedBy="rooms")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $roomtype;

    /**
     * @ORM\ManyToOne(targetEntity="Building",inversedBy="rooms")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $building;

    /**
     * @ORM\OneToMany(targetEntity="Timetable", mappedBy="room")
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
     * @return Room
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
     * @return Room
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

    /**
     * Set roomtype
     *
     * @param \AppBundle\Entity\Roomtype $roomtype
     *
     * @return Room
     */
    public function setRoomtype(\AppBundle\Entity\Roomtype $roomtype = null)
    {
        $this->roomtype = $roomtype;

        return $this;
    }

    /**
     * Get roomtype
     *
     * @return \AppBundle\Entity\Roomtype
     */
    public function getRoomtype()
    {
        return $this->roomtype;
    }

    /**
     * Set building
     *
     * @param \AppBundle\Entity\Building $building
     *
     * @return Room
     */
    public function setBuilding(\AppBundle\Entity\Building $building = null)
    {
        $this->building = $building;

        return $this;
    }

    /**
     * Get building
     *
     * @return \AppBundle\Entity\Building
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * Add timetable
     *
     * @param \AppBundle\Entity\Timetable $timetable
     *
     * @return Room
     */
    public function addTimetable(\AppBundle\Entity\Timetable $timetable)
    {
        $this->timetables[] = $timetable;

        return $this;
    }

    /**
     * Remove timetable
     *
     * @param \AppBundle\Entity\Timetable $timetable
     */
    public function removeTimetable(\AppBundle\Entity\Timetable $timetable)
    {
        $this->timetables->removeElement($timetable);
    }
}
