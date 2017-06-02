<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * faculty
 *
 * @ORM\Table(name="faculty")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FacultyRepository")
 */
class Faculty
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
     * @ORM\Column(name="fullname", type="string", length=255)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="shortname", type="string", length=255)
     */
    private $shortname;

    /**
     * @ORM\OneToMany(targetEntity="Subfaculty", mappedBy="faculty")
     */
    private $subfaculties;

    public function __construct() {
        $this->subfaculties = new ArrayCollection();
        $this->studygroups = new ArrayCollection();
    }

    public function getSubfaculties() {
        return $this->subfaculties;
    }

    /**
     * @ORM\OneToMany(targetEntity="StudyGroup", mappedBy="faculty")
     */
    private $studygroups;

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
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Faculty
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set shortname
     *
     * @param string $shortname
     *
     * @return Faculty
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

    /**
     * Add subfaculty
     *
     * @param \AppBundle\Entity\Subfaculty $subfaculty
     *
     * @return Faculty
     */
    public function addSubfaculty(\AppBundle\Entity\Subfaculty $subfaculty)
    {
        $this->subfaculties[] = $subfaculty;

        return $this;
    }

    /**
     * Remove subfaculty
     *
     * @param \AppBundle\Entity\Subfaculty $subfaculty
     */
    public function removeSubfaculty(\AppBundle\Entity\Subfaculty $subfaculty)
    {
        $this->subfaculties->removeElement($subfaculty);
    }



    /**
     * Add studygroup
     *
     * @param \AppBundle\Entity\StudyGroup $studygroup
     *
     * @return Faculty
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
