<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypeDeBienController extends AbstractController
{
    /**
     * @Route("/type/de/bien", name="type_de_bien")
     */
    public function index()
    {
        return $this->render('type_de_bien/index.html.twig', [
            'controller_name' => 'TypeDeBienController',
        ]);
    }
}
