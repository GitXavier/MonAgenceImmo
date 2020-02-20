<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TypeDePieceController extends AbstractController
{
    /**
     * @Route("/type/de/piece", name="type_de_piece")
     */
    public function index()
    {
        return $this->render('type_de_piece/index.html.twig', [
            'controller_name' => 'TypeDePieceController',
        ]);
    }
}
