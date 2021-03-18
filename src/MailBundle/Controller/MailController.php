<?php

namespace MailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Swift_Message;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function indexAction()
    {
        return $this->render('MailBundle:Default:index.html.twig');
    }
}
