<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * speciality
 *
 * @ORM\Table(name="speciality")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SpecialityRepository")
 */
class Speciality
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
     * @ORM\Column(name="shortspeciality", type="string", length=255)
     */
    private $shortspeciality;

    /**
     * @var string
     *
     * @ORM\Column(name="longspeciality", type="string", length=255, nullable=true)
     */
    private $longspeciality;

    /**
     * @ORM\OneToMany(targetEntity="StudyGroup", mappedBy="speciality")
     */
    private $studygroups;

    public function __construct() {
        $this->studygroups = new ArrayCollection();
    }

    public function getStudygroups() {
        return $this->studygroups;
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
     * Set shortspeciality
     *
     * @param string $shortspeciality
     *
     * @return Speciality
     */
    public function setShortspeciality($shortspeciality)
    {
        $this->shortspeciality = $shortspeciality;

        return $this;
    }

    /**
     * Get shortspeciality
     *
     * @return string
     */
    public function getShortspeciality()
    {
        return $this->shortspeciality;
    }

    /**
     * Set longspeciality
     *
     * @param string $longspeciality
     *
     * @return Speciality
     */
    public function setLongspeciality($longspeciality)
    {
        $this->longspeciality = $longspeciality;

        return $this;
    }

    /**
     * Get longspeciality
     *
     * @return string
     */
    public function getLongspeciality()
    {
        return $this->longspeciality;
    }

    /**
     * Add studygroup
     *
     * @param \AppBundle\Entity\StudyGroup $studygroup
     *
     * @return Speciality
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
}
