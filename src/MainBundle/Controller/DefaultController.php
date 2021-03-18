<?php

namespace MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /*public function indexAction()
    {
        //$this->denyAccessUnlessGranted('IS_FULLY_AUTHETIFICATED');
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('MainBundle:Default:index.html.twig');
    }*/

    public function choixAction()
    {
        return $this->render('@Main\Default\choix.html.twig');
    }

    public function indexAction()
    {

        if ($this->isGranted('ROLE_ADMIN')){
            return $this->redirectToRoute('fixit_admin_homepage');
        }
        return $this->render('MainBundle:Default:index.html.twig');
    }
    public function adminAction()
    {

        if ($this->isGranted('ROLE_ADMIN')){

            return $this->render('MainBundle:Default:back.html.twig');
        }
        else return $this->redirectToRoute('fixit_user_homepage');
    }

}
