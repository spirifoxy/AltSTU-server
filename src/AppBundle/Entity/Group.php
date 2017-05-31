<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * group
 *
 * @ORM\Table(name="group")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupsRepository")
 */
class Group
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
     * @ORM\Column(name="name1", type="string", length=255, nullable=true)
     */
    private $name1;

    /**
     * @var string
     *
     * @ORM\Column(name="name2", type="string", length=255, nullable=true)
     */
    private $name2;

    /**
     * @var int
     *
     * @ORM\Column(name="peoplecount", type="integer", nullable=true)
     */
    private $peoplecount;

    /**
     * @var int
     *
     * @ORM\Column(name="iddaynight", type="integer", nullable=true)
     */
    private $iddaynight;

    /**
     * @ORM\ManyToOne(targetEntity="Subfaculty",inversedBy="groups")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $subfaculty;

    /**
     * @ORM\ManyToOne(targetEntity="Faculty",inversedBy="groups")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $faculty;

    /**
     * @ORM\ManyToOne(targetEntity="Semester",inversedBy="groups")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $semester;

    /**
     * @ORM\ManyToOne(targetEntity="Educform",inversedBy="groups")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $educform;

    /**
     * @ORM\ManyToOne(targetEntity="Speciality",inversedBy="groups")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $speciality;

    /**
     * @ORM\OneToMany(targetEntity="Timetable", mappedBy="group")
     */
    private $timetables;


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
     * Set name1
     *
     * @param string $name1
     *
     * @return Group
     */
    public function setName1($name1)
    {
        $this->name1 = $name1;

        return $this;
    }

    /**
     * Get name1
     *
     * @return string
     */
    public function getName1()
    {
        return $this->name1;
    }

    /**
     * Set name2
     *
     * @param string $name2
     *
     * @return Group
     */
    public function setName2($name2)
    {
        $this->name2 = $name2;

        return $this;
    }

    /**
     * Get name2
     *
     * @return string
     */
    public function getName2()
    {
        return $this->name2;
    }

    /**
     * Set peoplecount
     *
     * @param integer $peoplecount
     *
     * @return Group
     */
    public function setPeoplecount($peoplecount)
    {
        $this->peoplecount = $peoplecount;

        return $this;
    }

    /**
     * Get peoplecount
     *
     * @return int
     */
    public function getPeoplecount()
    {
        return $this->peoplecount;
    }

    /**
     * Set iddaynight
     *
     * @param integer $iddaynight
     *
     * @return Group
     */
    public function setIddaynight($iddaynight)
    {
        $this->iddaynight = $iddaynight;

        return $this;
    }

    /**
     * Get iddaynight
     *
     * @return int
     */
    public function getIddaynight()
    {
        return $this->iddaynight;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->timetables = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set subfaculty
     *
     * @param \AppBundle\Entity\Subfaculty $subfaculty
     *
     * @return Group
     */
    public function setSubfaculty(\AppBundle\Entity\Subfaculty $subfaculty = null)
    {
        $this->subfaculty = $subfaculty;

        return $this;
    }

    /**
     * Get subfaculty
     *
     * @return \AppBundle\Entity\Subfaculty
     */
    public function getSubfaculty()
    {
        return $this->subfaculty;
    }

    /**
     * Set faculty
     *
     * @param \AppBundle\Entity\Faculty $faculty
     *
     * @return Group
     */
    public function setFaculty(\AppBundle\Entity\Faculty $faculty = null)
    {
        $this->faculty = $faculty;

        return $this;
    }

    /**
     * Get faculty
     *
     * @return \AppBundle\Entity\Faculty
     */
    public function getFaculty()
    {
        return $this->faculty;
    }

    /**
     * Set semester
     *
     * @param \AppBundle\Entity\Semester $semester
     *
     * @return Group
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
     * Set educform
     *
     * @param \AppBundle\Entity\Educform $educform
     *
     * @return Group
     */
    public function setEducform(\AppBundle\Entity\Educform $educform = null)
    {
        $this->educform = $educform;

        return $this;
    }

    /**
     * Get educform
     *
     * @return \AppBundle\Entity\Educform
     */
    public function getEducform()
    {
        return $this->educform;
    }

    /**
     * Set speciality
     *
     * @param \AppBundle\Entity\Speciality $speciality
     *
     * @return Group
     */
    public function setSpeciality(\AppBundle\Entity\Speciality $speciality = null)
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * Get speciality
     *
     * @return \AppBundle\Entity\Speciality
     */
    public function getSpeciality()
    {
        return $this->speciality;
    }

    /**
     * Add timetable
     *
     * @param \AppBundle\Entity\Timetable $timetable
     *
     * @return Group
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

    /**
     * Get timetables
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimetables()
    {
        return $this->timetables;
    }
}
