<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * educform
 *
 * @ORM\Table(name="educform")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EducformRepository")
 */
class Educform
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
     * @ORM\Column(name="formname", type="string", length=255, nullable=true)
     */
    private $formname;

    /**
     * @ORM\OneToMany(targetEntity="group", mappedBy="educform")
     */
    private $groups;

    public function __construct() {
        $this->groups = new ArrayCollection();
    }

    public function getGroups() {
        return $this->groups;
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
     * Set formname
     *
     * @param string $formname
     *
     * @return Educform
     */
    public function setFormname($formname)
    {
        $this->formname = $formname;

        return $this;
    }

    /**
     * Get formname
     *
     * @return string
     */
    public function getFormname()
    {
        return $this->formname;
    }
}

