<?php

namespace AnnonceBundle\Controller;


use AppBundle\Entity\Annonce;
use AppBundle\Entity\User;
use AppBundle\Form\AnnonceType;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;






class AnnonceController extends Controller
{
    public function indexAction()
    {
        return $this->render('OffreBundle:Default:index.html.twig');
    }



    public function affichertoutesannoncesAction(Request $request)    {
        $em = $this->getDoctrine()->getManager();

        $domaines = $em->getRepository("AppBundle:Domaine")->findAll();
        $annonces= $em->getRepository("AppBundle:Annonce")->findAll();

        $annonces  = $this->get('knp_paginator')->paginate(
            $annonces,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            3/*nbre d'éléments par page*/
        );

return $this->render('@Annonce/Default/affiche.html.twig', array('m' => $annonces , 'd'=>$domaines ));

    }

    public function afficherannonceAction(Request $request)    {
        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $logged = $this->container->get('security.token_storage')->getToken()->getUser();
            $user = $this->getDoctrine()->getRepository(User::class)->find($logged);


        }

        $en=$this->getDoctrine()->getManager();
        $annonce=$en->getRepository("AppBundle:Annonce")->findBy(array('idPrest'=>$user));
        $annonce  = $this->get('knp_paginator')->paginate(
            $annonce,
            $request->query->get('page', 1)/*le numéro de la page à afficher*/,
            3/*nbre d'éléments par page*/
        );

        return $this->render('@Annonce/Default/annonces.html.twig',array('m'=>$annonce));

    }
    public function ajouterAnnonceAction(Request $request)

    {
        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $logged = $this->container->get('security.token_storage')->getToken()->getUser();
            $user = $this->getDoctrine()->getRepository(User::class)->find($logged);
        }


        $annonce = new Annonce();
        $annonce->setIdPrest($user);
        $date = new \DateTime('now', new \DateTimezone('Europe/Paris'));
        $string = $date->format('Y-m-d H:i:s');
        $annonce->setDatecreation($string);
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $en = $this->getDoctrine()->getManager();
            $annonce->uploadPictures();

            if ($annonce->getPrix()==null)
            {
                return $this->render('@Annonce/Default/ajouter.html.twig',array('form'=>$form->createView(),'error'=>'Saisir un prix valide'));

            }

            $en->persist($annonce);


            $en->flush();

            $this->get('session')->getFlashBag()->add('notice','Votre annonce a bien été publiée avec succès.');
            return $this->redirectToRoute('annonceaff');


        }

        return $this->render('@Annonce/Default/ajouter.html.twig', array('form' => $form->createView()));


    }


    public function modifierAnnonceAction(Request $request,$id)

    {


        $en=$this->getDoctrine()->getManager();
        $annonce=$en->getRepository("AppBundle:Annonce")->find($id);

        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $en = $this->getDoctrine()->getManager();
            $en->persist($annonce);
            $annonce->uploadPictures();

            $en->flush();

            return $this->redirectToRoute('annonceaff');
        }
        return $this->render('@Annonce/Default/modifier.html.twig',array('form'=>$form->createView()));
    }

    public function supprimerAnnonceAction($id)
    {
        $en=$this->getDoctrine()->getManager();
        $annonce=$en->getRepository("AppBundle:Annonce")->find($id);
        $en->remove($annonce);
        $en->flush();
        return $this->redirectToRoute('annonceaff');
    }




    }
