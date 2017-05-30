<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * timetable
 *
 * @ORM\Table(name="timetable")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TimetableRepository")
 */
class Timetable
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
     * @var \DateTime
     *
     * @ORM\Column(name="begindatetime", type="date")
     */
    private $begindatetime;

    /**
     * @ORM\ManyToOne(targetEntity="Room",inversedBy="timetables")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $room;

    /**
     * @ORM\ManyToOne(targetEntity="Teacher",inversedBy="timetables")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $teacher;

    /**
     * @ORM\ManyToOne(targetEntity="Typelesson",inversedBy="timetables")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $typelect;

    /**
     * @ORM\ManyToOne(targetEntity="Semester",inversedBy="timetables")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $semester;

    /**
     * @ORM\ManyToOne(targetEntity="Group",inversedBy="timetables")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $group;



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
     * Set begindatetime
     *
     * @param \DateTime $begindatetime
     *
     * @return Timetable
     */
    public function setBegindatetime($begindatetime)
    {
        $this->begindatetime = $begindatetime;

        return $this;
    }

    /**
     * Get begindatetime
     *
     * @return \DateTime
     */
    public function getBegindatetime()
    {
        return $this->begindatetime;
    }
}

