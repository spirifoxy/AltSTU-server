<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * roomtype
 *
 * @ORM\Table(name="roomtype")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\roomtypeRepository")
 */
class roomtype
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
     * @ORM\OneToMany(targetEntity="room", mappedBy="roomtype")
     */
    private $rooms;

    public function __construct() {
        $this->rooms = new ArrayCollection();
    }

    public function getRoomtypes() {
        return $this->rooms;
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
     * @return roomtype
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
}

