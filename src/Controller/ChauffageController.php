<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChauffageController extends AbstractController
{
    /**
     * @Route("/chauffage", name="chauffage")
     */
    public function index()
    {
        return $this->render('chauffage/index.html.twig', [
            'controller_name' => 'ChauffageController',
        ]);
    }
}
