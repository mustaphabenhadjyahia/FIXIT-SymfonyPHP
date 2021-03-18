<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Annonce
 *
 * @ORM\Table(name="Annonce", indexes={@ORM\Index(name="id_prest", columns={"id_prest"}),@ORM\Index(name="domaine", columns={"domaine"})})
 * @ORM\Entity
 */
class Annonce
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_annonce", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAnnonce;

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
     * @var \Domaine
     *
     * @ORM\ManyToOne(targetEntity="Domaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domaine", referencedColumnName="Id")
     * })
     */
    private $domaine;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", nullable=false)
     */
    private $lieu;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", nullable=true)
     */
    private $image;

    /**
     * @return int
     */
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }

    /**
     * @param int $idAnnonce
     */
    public function setIdAnnonce($idAnnonce)
    {
        $this->idAnnonce = $idAnnonce;
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
    public function getDomaine()
    {
        return $this->domaine;
    }

    /**
     * @param int $domaine
     */
    public function setDomaine($domaine)
    {
        $this->domaine = $domaine;
    }

    /**
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param string $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
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
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="datecreation", type="string", length=20, nullable=true)
     */
    private $datecreation;

    /**
     * @Assert\File(maxSize="500k")
     */
    public $file;


    public function getWebPath(){
        return null===$this->image ? null : $this->getUploadDir().'/'.$this->image;
    }
    protected function getUploadRootDir(){
        return 'C:/wamp64/www/FIXIT/SMF1/web/'.$this->getUploadDir();
    }
    protected  function getUploadDir(){
        return 'img';
    }
    public function uploadPictures(){
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        $this->image=$this->file->getClientOriginalName();
        $this->file=null;


    }

    public function uploadProfilePicture()
    {
        if (null === $this->file) {
            return;
        }
        if(!$this->idAnnonce){
            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        }else{

            $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        }
        $this->setImage($this->file->getClientOriginalName());
    }

}

