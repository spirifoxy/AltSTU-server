<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Post
{

    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @var float
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createDate;

    function __construct()
    {
        $this->createDate = new \DateTime();
    }

    function getId()
    {
        return $this->id;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getText()
    {
        return $this->text;
    }

    public function getCreateDate()
    {
        return $this->createDate;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }

    function setText($text)
    {
        $this->text = $text;
    }

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

}