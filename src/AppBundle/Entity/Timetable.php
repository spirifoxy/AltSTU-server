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
    private $typelesson;

    /**
     * @ORM\ManyToOne(targetEntity="Semester",inversedBy="timetables")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $semester;

    /**
     * @ORM\ManyToOne(targetEntity="StudyGroup",inversedBy="timetables")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $studygroup;



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

    /**
     * Set room
     *
     * @param \AppBundle\Entity\Room $room
     *
     * @return Timetable
     */
    public function setRoom(\AppBundle\Entity\Room $room = null)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return \AppBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set teacher
     *
     * @param \AppBundle\Entity\Teacher $teacher
     *
     * @return Timetable
     */
    public function setTeacher(\AppBundle\Entity\Teacher $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \AppBundle\Entity\Teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set typelesson
     *
     * @param \AppBundle\Entity\Typelesson $typelesson
     *
     * @return Timetable
     */
    public function setTypelesson(\AppBundle\Entity\Typelesson $typelesson = null)
    {
        $this->typelesson = $typelesson;

        return $this;
    }

    /**
     * Get typelesson
     *
     * @return \AppBundle\Entity\Typelesson
     */
    public function getTypelesson()
    {
        return $this->typelesson;
    }

    /**
     * Set semester
     *
     * @param \AppBundle\Entity\Semester $semester
     *
     * @return Timetable
     */
    public function setSemester(\AppBundle\Entity\Semester $semester = null)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester
     *
     * @return \AppBundle\Entity\Semester
     */
    public function getSemester()
    {
        return $this->semester;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\StudyGroup $studygroup
     *
     * @return Timetable
     */
    public function setStudygroup(\AppBundle\Entity\StudyGroup $studygroup = null)
    {
        $this->studygroup = $studygroup;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\StudyGroup
     */
    public function getStudygroup()
    {
        return $this->studygroup;
    }
}
