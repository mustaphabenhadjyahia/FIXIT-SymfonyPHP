<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sousdomaine
 *
 * @ORM\Table(name="sousdomaine", indexes={@ORM\Index(name="id_domaine", columns={"id_domaine"})})
 * @ORM\Entity
 */
class Sousdomaine
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
     * @ORM\Column(name="Nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var \Domaine
     *
     * @ORM\ManyToOne(targetEntity="Domaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_domaine", referencedColumnName="Id")
     * })
     */
    private $idDomaine;


}

