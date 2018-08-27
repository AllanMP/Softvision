<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/sair", name="sair")
     */
    public function sair()
    {
        return $this->render('default/sair.html.twig');
    }
}
