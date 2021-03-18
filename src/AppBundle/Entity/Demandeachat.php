<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demandeachat
 *
 * @ORM\Table(name="demandeachat", indexes={@ORM\Index(name="categorie", columns={"categorie"}), @ORM\Index(name="cible", columns={"cible"}), @ORM\Index(name="demandeur", columns={"demandeur"}), @ORM\Index(name="souscategorie", columns={"souscategorie"})})
 * @ORM\Entity
 */
class Demandeachat
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
     * @ORM\Column(name="Objet", type="string", length=255, nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
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
     * @var integer
     *
     * @ORM\Column(name="Quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var integer
     *
     * @ORM\Column(name="Occasion", type="integer", nullable=false)
     */
    private $occasion;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie", referencedColumnName="Id")
     * })
     */
    private $categorie;

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
     * @var \Souscategorie
     *
     * @ORM\ManyToOne(targetEntity="Souscategorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="souscategorie", referencedColumnName="Id")
     * })
     */
    private $souscategorie;


}

