<?php

namespace RJM\Bundle\GenemuSandboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('RJMGenemuSandboxBundle:Default:index.html.twig');
    }
}