<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandeservice
 *
 * @ORM\Table(name="demandeservice", indexes={@ORM\Index(name="domaine", columns={"domaine"}), @ORM\Index(name="cible", columns={"cible"}), @ORM\Index(name="demandeur", columns={"demandeur"}), @ORM\Index(name="sousdomaine", columns={"sousdomaine"})})
 * @ORM\Entity
 */
class Demandeservice
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Objet", type="string", length=255, nullable=true)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="TypeDemande", type="integer", nullable=false)
     */
    private $typedemande;

    /**
     * @var integer
     *
     * @ORM\Column(name="demandeur", type="integer", nullable=false)
     */
    private $demandeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="TypeDemandeur", type="integer", nullable=false)
     */
    private $typedemandeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DeadLine", type="date", nullable=true)
     */
    private $deadline;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var \Domaine
     *
     * @ORM\ManyToOne(targetEntity="Domaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domaine", referencedColumnName="Id")
     * })
     */
    private $domaine;

    /**
     * @var \Prestataire
     *
     * @ORM\ManyToOne(targetEntity="Prestataire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cible", referencedColumnName="Id")
     * })
     */
    private $cible;

    /**
     * @var \Sousdomaine
     *
     * @ORM\ManyToOne(targetEntity="Sousdomaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sousdomaine", referencedColumnName="Id")
     * })
     */
    private $sousdomaine;


}

