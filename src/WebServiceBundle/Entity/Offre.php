<?php

namespace WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre", indexes={@ORM\Index(name="id_dem", columns={"id_dem"}), @ORM\Index(name="id_prest", columns={"id_prest"})})
 * @ORM\Entity(repositoryClass="WebServiceBundle\Repository\OffreRepository")
 */
class Offre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_offre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=50, nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=150, nullable=false)
     */
    private $description;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prest", referencedColumnName="id")
     * })
     */
    private $idPrest;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_dem", type="integer", nullable=true)
     */
    private $idDem;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="état", type="integer", nullable=false)
     */
    public $�tat = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="datecreation", type="string", length=20, nullable=true)
     */
    private $datecreation;

    /**
     * @var integer
     *
     * @ORM\Column(name="typeOffre", type="integer", nullable=true)
     */
    private $typeoffre;

    /**
     * @return int
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * @param int $idOffre
     */
    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;
    }

    /**
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * @param string $objet
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
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
     * @return \User
     */
    public function getIdPrest()
    {
        return $this->idPrest;
    }

    /**
     * @param \User $idPrest
     */
    public function setIdPrest($idPrest)
    {
        $this->idPrest = $idPrest;
    }

    /**
     * @return int
     */
    public function getIdDem()
    {
        return $this->idDem;
    }

    /**
     * @param int $idDem
     */
    public function setIdDem($idDem)
    {
        $this->idDem = $idDem;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return int
     */
    public function get�tat()
    {
        return $this->�tat;
    }

    /**
     * @param int $�tat
     */
    public function set�tat($�tat)
    {
        $this->�tat = $�tat;
    }

    /**
     * @return string
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }

    /**
     * @param string $datecreation
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;
    }

    /**
     * @return int
     */
    public function getTypeoffre()
    {
        return $this->typeoffre;
    }

    /**
     * @param int $typeoffre
     */
    public function setTypeoffre($typeoffre)
    {
        $this->typeoffre = $typeoffre;
    }


}

