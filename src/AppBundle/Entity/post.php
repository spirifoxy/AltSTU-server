<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\postRepository")
 */
class post
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
     * @ORM\Column(name="longname", type="string", length=255)
     */
    private $longname;

    /**
     * @var string
     *
     * @ORM\Column(name="shortname", type="string", length=255)
     */
    private $shortname;


    /**
     * @ORM\OneToMany(targetEntity="teacher", mappedBy="post")
     */
    private $teachers;

    public function __construct() {
        $this->teachers = new ArrayCollection();
    }

    public function getTeachers() {
        return $this->teachers;
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
     * Set longname
     *
     * @param string $longname
     *
     * @return post
     */
    public function setLongname($longname)
    {
        $this->longname = $longname;

        return $this;
    }

    /**
     * Get longname
     *
     * @return string
     */
    public function getLongname()
    {
        return $this->longname;
    }

    /**
     * Set shortname
     *
     * @param string $shortname
     *
     * @return post
     */
    public function setShortname($shortname)
    {
        $this->shortname = $shortname;

        return $this;
    }

    /**
     * Get shortname
     *
     * @return string
     */
    public function getShortname()
    {
        return $this->shortname;
    }
}

