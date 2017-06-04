<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * subfaculty
 *
 * @ORM\Table(name="subfaculty")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubfacultyRepository")
 */
class Subfaculty
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
     * @ORM\Column(name="shortsubfaculty", type="string", length=255)
     */
    private $shortsubfaculty;

    /**
     * @var string
     *
     * @ORM\Column(name="longsubfaculty", type="string", length=255)
     */
    private $longsubfaculty;

    /**
     * @var bool
     *
     * @ORM\Column(name="isexist", type="boolean", nullable=true, options={"default":1})
     */
    private $isexist;

    /**
     * @var int
     *
     * @ORM\Column(name="idboss", type="integer", nullable=true)
     */
    private $idboss;

    /**
     * @ORM\ManyToOne(targetEntity="Faculty")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $faculty;

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
     * Set shortsubfaculty
     *
     * @param string $shortsubfaculty
     *
     * @return Subfaculty
     */
    public function setShortsubfaculty($shortsubfaculty)
    {
        $this->shortsubfaculty = $shortsubfaculty;

        return $this;
    }

    /**
     * Get shortsubfaculty
     *
     * @return string
     */
    public function getShortsubfaculty()
    {
        return $this->shortsubfaculty;
    }

    /**
     * Set longsubfaculty
     *
     * @param string $longsubfaculty
     *
     * @return Subfaculty
     */
    public function setLongsubfaculty($longsubfaculty)
    {
        $this->longsubfaculty = $longsubfaculty;

        return $this;
    }

    /**
     * Get longsubfaculty
     *
     * @return string
     */
    public function getLongsubfaculty()
    {
        return $this->longsubfaculty;
    }

    /**
     * Set isexist
     *
     * @param boolean $isexist
     *
     * @return Subfaculty
     */
    public function setIsexist($isexist)
    {
        $this->isexist = $isexist;

        return $this;
    }

    /**
     * Get isexist
     *
     * @return bool
     */
    public function getIsexist()
    {
        return $this->isexist;
    }

    /**
     * Set idboss
     *
     * @param integer $idboss
     *
     * @return Subfaculty
     */
    public function setIdboss($idboss)
    {
        $this->idboss = $idboss;

        return $this;
    }

    /**
     * Get idboss
     *
     * @return int
     */
    public function getIdboss()
    {
        return $this->idboss;
    }

    /**
     * Set faculty
     *
     * @param \AppBundle\Entity\Faculty $faculty
     *
     * @return Subfaculty
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
     * Add studygroup
     *
     * @param \AppBundle\Entity\StudyGroup $studygroup
     *
     * @return Subfaculty
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
