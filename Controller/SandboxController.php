<?php

namespace RJM\Bundle\GenemuSandboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RJM\Bundle\GenemuSandboxBundle\Form\PostType;

class SandboxController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('RJMGenemuSandboxBundle:Sandbox:index.html.twig');
    }

    public function select2EntityAction()
    {
        return $this->render('RJMGenemuSandboxBundle:Sandbox:select2_entity.html.twig', array(
            'form' => $this->createForm(new PostType())->createView()
        ));
    }
}