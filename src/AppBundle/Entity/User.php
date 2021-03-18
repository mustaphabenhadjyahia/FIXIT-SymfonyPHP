<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *@ORM\Column(name="score",type="string", length=255,nullable=true)
     */
    private $score;

    /**
     *@ORM\Column(name="nom",type="string", length=255,nullable=false)
     */
    private $nom;

    /**
     *@ORM\Column(name="pays",type="string", length=255,nullable=false)
     */
    private $pays;

    /**
     *@ORM\Column(name="ville",type="string", length=255,nullable=true)
     */
    private $ville;

    /**
     *@ORM\Column(name="adresse",type="string", length=255,nullable=false)
     */
    private $adresse;

    /**
     *@ORM\Column(name="tel",type="string", length=8,nullable=false)
     */
    private $tel;

    /**
     *@ORM\Column(name="nbeffectif",type="string", length=255,nullable=false)
     */
    private $nbeffectif;

    /**
     *@ORM\Column(name="sexe",type="string", length=255,nullable=true)
     */
    private $sexe;

    /**
     *@ORM\Column(name="titre",type="string", length=255,nullable=true)
     */
    private $titre;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getNbeffectif()
    {
        return $this->nbeffectif;
    }

    /**
     * @param mixed $nbeffectif
     */
    public function setNbeffectif($nbeffectif)
    {
        $this->nbeffectif = $nbeffectif;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }








    /**
     * Set score
     *
     * @param string $score
     *
     * @return User
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string
     */
    public function getScore()
    {
        return $this->score;
    }


    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }


    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return User
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }
}
