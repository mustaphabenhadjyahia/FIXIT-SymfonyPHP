<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="IDX_29A5EC27FE6E88D7", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="WebServiceBundle\Repository\ReclamationRepository")
 */
class Reclamation
{/**
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
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateceation", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="integer", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="short_descr", type="string", length=255)
     */
    private $short_descr;



    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="reclamations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="target", referencedColumnName="id")
     */
    private $target;



    /**
     * @var int
     *
     * @ORM\Column(name="target_id", type="integer",nullable=true)
     */
    private $target_id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }


    /**
     * @var int
     *
     * @ORM\Column(name="visible", type="integer")
     */
    private $visible=0;

    /**
     * @return int
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @param int $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="ref_img", type="string", length=254, nullable=true)
     */
    private $ref_img;

    /**
     * @return string
     */
    public function getRefImg()
    {
        return $this->ref_img;
    }

    /**
     * @param string $ref_img
     */
    public function setRefImg($ref_img)
    {
        $this->ref_img = $ref_img;
    }




    /**
     * @return string
     */
    public function getShortDescr()
    {
        return $this->short_descr;
    }

    /**
     * @param string $short_descr
     */
    public function setShortDescr($short_descr)
    {
        $this->short_descr = $short_descr;
    }
















    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reclamation
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Set target
     *
     * @param \AppBundle\Entity\User $target
     *
     * @return Reclamation
     */
    public function setTarget(\AppBundle\Entity\User $target = null)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return \AppBundle\Entity\User
     */
    public function getTarget()
    {
        return $this->target;
    }




    /**
     * @var string
     *
     * @ORM\Column(name="natureReclamation", type="string", length=255)
     */
    private $natureReclamation;

    /**
     * Set natureReclamation
     *
     * @param string $natureReclamation
     *
     * @return Reclamation
     */
    public function setNatureReclamation($natureReclamation)
    {
        $this->natureReclamation = $natureReclamation;

        return $this;
    }

    /**
     * Get natureReclamation
     *
     * @return string
     */
    public function getNatureReclamation()
    {
        return $this->natureReclamation;
    }



}
