<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Form\BienType;
use App\Repository\BienRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AdminBienController
 * @package App\Controller
 * @Route("admin/bien/", name="bien_")
 */
class AdminBienController extends AbstractController
{
    /**
     * @Route("index", name="index")
     */
    public function index()
    {

        return $this->render('admin/bien/index.html.twig' );

    }

    /**
     * @Route("edit", name="edit")
     */
    public function edit(Request $request,EntityManagerInterface $entityManager)
    {
        $bien = new Bien();
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bien);
            $entityManager->flush();
        }
        return $this->render('admin/bien/edit.html.twig', [
            'bien' => $bien,
            'form' => $form->createView()
        ]);

    }
}
