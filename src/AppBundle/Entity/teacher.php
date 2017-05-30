<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * teacher
 *
 * @ORM\Table(name="teacher")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\teacherRepository")
 */
class teacher
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="patronymic", type="string", length=255)
     */
    private $patronymic;

    /**
     * @ORM\ManyToOne(targetEntity="post",inversedBy="teachers")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="degree",inversedBy="teachers")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $degree;
    /**
     * @ORM\ManyToOne(targetEntity="rank",inversedBy="teachers")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $rank;
    /**
     * @ORM\ManyToOne(targetEntity="subfaculty",inversedBy="teachers")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $subfaculty;

    /**
     * @ORM\OneToMany(targetEntity="timetable", mappedBy="teacher")
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
     * Set name
     *
     * @param string $name
     *
     * @return teacher
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
     * Set surname
     *
     * @param string $surname
     *
     * @return teacher
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set patronymic
     *
     * @param string $patronymic
     *
     * @return teacher
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * Get patronymic
     *
     * @return string
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }
}

