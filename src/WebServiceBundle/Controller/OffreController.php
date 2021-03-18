<?php

namespace WebServiceBundle\Controller;


use WebServiceBundle\Entity\Offre;
use WebServiceBundle\Entity\User;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class OffreController extends Controller
{
    public function terminerOffreAction($id){

        $en = $this->getDoctrine()->getManager();
        $offre = $en->getRepository("WebServiceBundle:Offre")->find($id);
        $offre->set�tat(2);
        $en->persist($offre);
        $en->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($offre);
        return new JsonResponse($formatted);
    }

    public function affichertravauxterminesAction($id)
    {
        $en = $this->getDoctrine()->getManager();
        $offres = $en->getRepository('WebServiceBundle:Offre')->findBy(array('idPrest'=>$id,'�tat'=>2));
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($offres);
        return new JsonResponse($formatted);

    }
    public function affichertravauxAction($id)
    {
        $en = $this->getDoctrine()->getManager();
        $offres = $en->getRepository('WebServiceBundle:Offre')->findBy(array('idPrest'=>$id,'�tat'=>1));
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($offres);
        return new JsonResponse($formatted);

    }

    public function afficheroffresAction($id)
    {
        $en = $this->getDoctrine()->getManager();

        $offres = $en->getRepository('WebServiceBundle:Offre')->findBy(array('idPrest'=>$id,'�tat'=>0));
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($offres);
        return new JsonResponse($formatted);

    }

    public function ajouterOffreAction(Request $request)

    {

       // $user = $this->getDoctrine()->getRepository(User::class)->find(1);
        $en = $this->getDoctrine()->getManager();
        $user = $en->getRepository('WebServiceBundle:User')->find($request->get('idPrest'));

        $offre = new Offre();
        $offre->setIdPrest($user);
        $date = new \DateTime('now', new \DateTimezone('Europe/Paris'));
        $string = $date->format('Y-m-d H:i:s');
        $offre->setDatecreation($string);
$offre->setObjet($request->get('objet'));
$offre->setDescription(($request->get('description')));
$offre->setPrix($request->get('prix'));




            $en->persist($offre);
            $en->flush();

        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($offre);
        return new JsonResponse($formatted);

        }



}