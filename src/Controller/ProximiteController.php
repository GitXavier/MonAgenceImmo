<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProximiteController extends AbstractController
{
    /**
     * @Route("/proximite", name="proximite")
     */
    public function index()
    {
        return $this->render('proximite/index.html.twig', [
            'controller_name' => 'ProximiteController',
        ]);
    }
}
