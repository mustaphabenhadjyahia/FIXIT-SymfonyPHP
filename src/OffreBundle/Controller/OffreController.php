<?php

namespace OffreBundle\Controller;


use AppBundle\Entity\Offre;
use AppBundle\Entity\User;
use AppBundle\Form\OffreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;






class OffreController extends Controller
{
    public function indexAction()
    {
        return $this->render('OffreBundle:Default:index.html.twig');
    }

    public function offreAction()
    {
        return $this->redirectToRoute('offreaff');
    }


    public function afficheroffreAction()    {
        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $logged = $this->container->get('security.token_storage')->getToken()->getUser();
            $user = $this->getDoctrine()->getRepository(User::class)->find($logged);


        }

        $en=$this->getDoctrine()->getManager();
        $offre=$en->getRepository("AppBundle:Offre")->findBy(array('idPrest'=>$user));

        return $this->render('@Offre/Default/offres.html.twig',array('m'=>$offre));

    }

    public function ajouterOffreAction(Request $request)

    {
        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $logged = $this->container->get('security.token_storage')->getToken()->getUser();
            $user = $this->getDoctrine()->getRepository(User::class)->find($logged);
        }


        $offre = new Offre();
        $offre->setIdPrest($user);
        $date = new \DateTime('now', new \DateTimezone('Europe/Paris'));
        $string = $date->format('Y-m-d H:i:s');
        $offre->setDatecreation($string);
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $en = $this->getDoctrine()->getManager();
if ($offre->getPrix()==null)
{
    return $this->render('@Offre/Default/ajouter.html.twig',array('form'=>$form->createView(),'error'=>'Saisir un prix valide'));

}
            $en->persist($offre);
            $en->flush();

            $message = (new \Swift_Message('Offre Reçue'))
                ->setFrom('mustapha.benhadjyahia@gmail.com')
                ->setTo($offre->getIdPrest()->getEmail())
                ->setBody(
                    $this->renderView(

                        '@Mail/Default/mail.html.twig'
                    ),
                    'text/html'
                )
                ->addPart(
                    $this->renderView(
                        '@Mail/Default/mail.html.twig'
                    ),
                    'text/plain'
                );
            $this->get('mailer')->send($message);


            $this->get('session')->getFlashBag()->add('notice','Votre offre a bien été ajoutée avec succès.');
            return $this->redirectToRoute('offreaff');




        }

        return $this->render('@Offre/Default/ajouter.html.twig',array('form'=>$form->createView()));
    }


    public function modifierOffreAction(Request $request,$id)

    {


        $en=$this->getDoctrine()->getManager();
        $offre=$en->getRepository("AppBundle:Offre")->find($id);

        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $en = $this->getDoctrine()->getManager();
            $en->persist($offre);
            $en->flush();

            return $this->redirectToRoute('offreaff');
        }
        return $this->render('@Offre/Default/modifier.html.twig',array('form'=>$form->createView()));
    }

    public function supprimeroffreAction($id)
    {
        $en=$this->getDoctrine()->getManager();
        $offre=$en->getRepository("AppBundle:Offre")->find($id);
        $en->remove($offre);
        $en->flush();
        return $this->redirectToRoute('offreaff');
    }

    public function rechercheroffreAction(Request $request)
    {
        $offre = new Offre();
        if($request->isMethod('POST')){

            $offre->setObjet($request->get('objet'));

            $en=$this->getDoctrine()->getManager();
            $offre=$en->getRepository("AppBundle:Offre")->findBy(array('objet'=>$offre->getObjet()));
            return $this->render('@Offre/Default/rechercher.html.twig',array('o'=>$offre));

        }
        else{
            $enn=$this->getDoctrine()->getManager();
            $offre=$enn->getRepository("AppBundle:Offre")->findAll();

            return $this->render('@Offre/Default/rechercher.html.twig',array('o'=>$offre));
        }

    }




}
