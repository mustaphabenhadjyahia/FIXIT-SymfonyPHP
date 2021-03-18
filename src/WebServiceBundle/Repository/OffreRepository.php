<?php

namespace WebServiceBundle\Repository;
use Doctrine\ORM\EntityRepository;

class OffreRepository extends EntityRepository

{




public function findByuser($id,$etat)
    {
        $query = $this->getEntityManager()->createQuery("select o from WebServiceBundle:Offre o WHERE o.idPrest=:id and o.état=:etat")
            ->setParameter('id',$id)->setParameter('etat',$etat);
        return $query->getResult();


    }












}
