<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="id_memb", columns={"id_user"}), @ORM\Index(name="id_prestt", columns={"id_prestt"})})
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_reclam", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReclam;

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
     * @var integer
     *
     * @ORM\Column(name="id_prestt", type="integer", nullable=true)
     */
    private $idPrestt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=true)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reclam", type="date", nullable=true)
     */
    private $dateReclam;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat_reclam", type="integer", nullable=true)
     */
    private $etatReclam;

    /**
     * @var string
     *
     * @ORM\Column(name="piece", type="string", length=100, nullable=true)
     */
    private $piece;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_reclameur", type="integer", nullable=false)
     */
    private $typeReclameur;


}

