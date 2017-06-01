<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * semester
 *
 * @ORM\Table(name="semester")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SemesterRepository")
 */
class Semester
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begindate", type="date")
     */
    private $begindate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="enddate", type="date")
     */
    private $enddate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginbreak", type="date", nullable=true)
     */
    private $beginbreak;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endbreak", type="date", nullable=true)
     */
    private $endbreak;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginsession", type="date", nullable=true)
     */
    private $beginsession;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endsession", type="date", nullable=false)
     */
    private $endsession;

    /**
     * @var int
     *
     * @ORM\Column(name="lastweeknumber", type="integer", nullable=true)
     */
    private $lastweeknumber;

    /**
     * @var bool
     *
     * @ORM\Column(name="isactive", type="boolean", nullable=true)
     */
    private $isactive;

    /**
     * @ORM\OneToMany(targetEntity="StudyGroup", mappedBy="semester")
     */
    private $studygroups;

    public function getStudygroups() {
        return $this->studygroups;
    }

    public function __construct() {
        $this->studygroups = new ArrayCollection();
        $this->timetables = new ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="Timetable", mappedBy="semester")
     */
    private $timetables;

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
     * Set name
     *
     * @param string $name
     *
     * @return Semester
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set begindate
     *
     * @param \DateTime $begindate
     *
     * @return Semester
     */
    public function setBegindate($begindate)
    {
        $this->begindate = $begindate;

        return $this;
    }

    /**
     * Get begindate
     *
     * @return \DateTime
     */
    public function getBegindate()
    {
        return $this->begindate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return Semester
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set beginbreak
     *
     * @param \DateTime $beginbreak
     *
     * @return Semester
     */
    public function setBeginbreak($beginbreak)
    {
        $this->beginbreak = $beginbreak;

        return $this;
    }

    /**
     * Get beginbreak
     *
     * @return \DateTime
     */
    public function getBeginbreak()
    {
        return $this->beginbreak;
    }

    /**
     * Set endbreak
     *
     * @param \DateTime $endbreak
     *
     * @return Semester
     */
    public function setEndbreak($endbreak)
    {
        $this->endbreak = $endbreak;

        return $this;
    }

    /**
     * Get endbreak
     *
     * @return \DateTime
     */
    public function getEndbreak()
    {
        return $this->endbreak;
    }

    /**
     * Set beginsession
     *
     * @param \DateTime $beginsession
     *
     * @return Semester
     */
    public function setBeginsession($beginsession)
    {
        $this->beginsession = $beginsession;

        return $this;
    }

    /**
     * Get beginsession
     *
     * @return \DateTime
     */
    public function getBeginsession()
    {
        return $this->beginsession;
    }

    /**
     * Set endsession
     *
     * @param \DateTime $endsession
     *
     * @return Semester
     */
    public function setEndsession($endsession)
    {
        $this->endsession = $endsession;

        return $this;
    }

    /**
     * Get endsession
     *
     * @return \DateTime
     */
    public function getEndsession()
    {
        return $this->endsession;
    }

    /**
     * Set lastweeknumber
     *
     * @param integer $lastweeknumber
     *
     * @return Semester
     */
    public function setLastweeknumber($lastweeknumber)
    {
        $this->lastweeknumber = $lastweeknumber;

        return $this;
    }

    /**
     * Get lastweeknumber
     *
     * @return int
     */
    public function getLastweeknumber()
    {
        return $this->lastweeknumber;
    }


    /**
     * Set isactive
     *
     * @param boolean $isactive
     *
     * @return Semester
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return bool
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Add studygroup
     *
     * @param \AppBundle\Entity\StudyGroup $studygroup
     *
     * @return Semester
     */
    public function addStudygroup(\AppBundle\Entity\StudyGroup $studygroup)
    {
        $this->studygroups[] = $studygroup;

        return $this;
    }

    /**
     * Remove studygroup
     *
     * @param \AppBundle\Entity\StudyGroup $studygroup
     */
    public function removeStudygroup(\AppBundle\Entity\StudyGroup $studygroup)
    {
        $this->studygroups->removeElement($studygroup);
    }

    /**
     * Add timetable
     *
     * @param \AppBundle\Entity\Timetable $timetable
     *
     * @return Semester
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
