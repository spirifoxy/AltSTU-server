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
     * @var \DateTime
     *
     * @ORM\Column(name="beginday1", type="date", nullable=true)
     */
    private $beginday1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endday1", type="date", nullable=true)
     */
    private $endday1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginday2", type="date", nullable=true)
     */
    private $beginday2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endday2", type="date", nullable=true)
     */
    private $endday2;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="beginday3", type="date", nullable=true)
     */
    private $beginday3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endday3", type="date", nullable=true)
     */
    private $endday3;

    /**
     * @var bool
     *
     * @ORM\Column(name="isactive", type="boolean", nullable=true)
     */
    private $isactive;

    /**
     * @ORM\OneToMany(targetEntity="Group", mappedBy="Semester")
     */
    private $groups;

    public function __construct() {
        $this->groups = new ArrayCollection();
        $this->timetables = new ArrayCollection();
    }

    public function getGroups() {
        return $this->groups;
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
     * Set beginday1
     *
     * @param \DateTime $beginday1
     *
     * @return Semester
     */
    public function setBeginday1($beginday1)
    {
        $this->beginday1 = $beginday1;

        return $this;
    }

    /**
     * Get beginday1
     *
     * @return \DateTime
     */
    public function getBeginday1()
    {
        return $this->beginday1;
    }

    /**
     * Set endday1
     *
     * @param \DateTime $endday1
     *
     * @return Semester
     */
    public function setEndday1($endday1)
    {
        $this->endday1 = $endday1;

        return $this;
    }

    /**
     * Get endday1
     *
     * @return \DateTime
     */
    public function getEndday1()
    {
        return $this->endday1;
    }

    /**
     * Set beginday2
     *
     * @param \DateTime $beginday2
     *
     * @return Semester
     */
    public function setBeginday2($beginday2)
    {
        $this->beginday2 = $beginday2;

        return $this;
    }

    /**
     * Get beginday2
     *
     * @return \DateTime
     */
    public function getBeginday2()
    {
        return $this->beginday2;
    }

    /**
     * Set endday2
     *
     * @param \DateTime $endday2
     *
     * @return Semester
     */
    public function setEndday2($endday2)
    {
        $this->endday2 = $endday2;

        return $this;
    }

    /**
     * Get endday2
     *
     * @return \DateTime
     */
    public function getEndday2()
    {
        return $this->endday2;
    }

    /**
     * Set beginday3
     *
     * @param \DateTime $beginday3
     *
     * @return Semester
     */
    public function setBeginday3($beginday3)
    {
        $this->beginday3 = $beginday3;

        return $this;
    }

    /**
     * Get beginday3
     *
     * @return \DateTime
     */
    public function getBeginday3()
    {
        return $this->beginday3;
    }

    /**
     * Set endday3
     *
     * @param \DateTime $endday3
     *
     * @return Semester
     */
    public function setEndday3($endday3)
    {
        $this->endday3 = $endday3;

        return $this;
    }

    /**
     * Get endday3
     *
     * @return \DateTime
     */
    public function getEndday3()
    {
        return $this->endday3;
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
}

