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
}

