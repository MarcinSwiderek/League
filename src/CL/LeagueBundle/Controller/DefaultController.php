<?php

namespace CL\LeagueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CLLeagueBundle:Default:index.html.twig', array('name' => $name));
    }
}
