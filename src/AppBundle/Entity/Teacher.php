<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * teacher
 *
 * @ORM\Table(name="teacher")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeacherRepository")
 */
class Teacher
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
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="Degree")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $degree;
    /**
     * @ORM\ManyToOne(targetEntity="Rank")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $rank;
    /**
     * @ORM\ManyToOne(targetEntity="Subfaculty")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $subfaculty;

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
     * @return Teacher
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
     * @return Teacher
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
     * @return Teacher
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

    /**
     * Set post
     *
     * @param \AppBundle\Entity\post $post
     *
     * @return Teacher
     */
    public function setPost(\AppBundle\Entity\post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \AppBundle\Entity\post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set degree
     *
     * @param \AppBundle\Entity\degree $degree
     *
     * @return Teacher
     */
    public function setDegree(\AppBundle\Entity\degree $degree = null)
    {
        $this->degree = $degree;

        return $this;
    }

    /**
     * Get degree
     *
     * @return \AppBundle\Entity\degree
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Set rank
     *
     * @param \AppBundle\Entity\rank $rank
     *
     * @return Teacher
     */
    public function setRank(\AppBundle\Entity\rank $rank = null)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return \AppBundle\Entity\rank
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set subfaculty
     *
     * @param \AppBundle\Entity\Subfaculty $subfaculty
     *
     * @return Teacher
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

}
