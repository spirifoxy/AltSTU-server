<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * rank
 *
 * @ORM\Table(name="rank")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RankRepository")
 */
class Rank
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
     * @ORM\Column(name="rankname", type="string", length=255, nullable=true)
     */
    private $rankname;

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
     * Set rankname
     *
     * @param string $rankname
     *
     * @return Rank
     */
    public function setRankname($rankname)
    {
        $this->rankname = $rankname;

        return $this;
    }

    /**
     * Get rankname
     *
     * @return string
     */
    public function getRankname()
    {
        return $this->rankname;
    }
}

