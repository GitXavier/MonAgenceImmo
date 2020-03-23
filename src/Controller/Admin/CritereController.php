<?php

namespace App\Controller\Admin;

use App\Entity\Critere;
use App\Form\CritereType;
use App\Repository\CritereRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CritereController
 * @package App\Controller\Admin
 * @Route("/admin/critere")
 */
class CritereController extends AbstractController
{
    /**
     * @Route("/", name="critere_index", methods={"GET"})
     * @IsGranted("ROLE_SUPER")
     */
    public function index(CritereRepository $critereRepository): Response
    {
        return $this->render('admin/critere/index.html.twig', [
            'criteres' => $critereRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="critere_new", methods={"GET","POST"})
     * @IsGranted("ROLE_SUPER")
     */
    public function new(Request $request): Response
    {
        $critere = new Critere();
        $form = $this->createForm(CritereType::class, $critere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($critere);
            $entityManager->flush();
            $this->addFlash('success', 'Le critère à été crée avec succès.');

            return $this->redirectToRoute('critere_index');
        }

        return $this->render('admin/critere/new.html.twig', [
            'critere' => $critere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="critere_show", methods={"GET"})
     * @IsGranted("ROLE_SUPER")
     */
    public function show(Critere $critere): Response
    {
        return $this->render('admin/critere/show.html.twig', [
            'critere' => $critere,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="critere_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_SUPER")
     */
    public function edit(Request $request, Critere $critere): Response
    {
        $form = $this->createForm(CritereType::class, $critere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Le critère à été modifié avec succès');

            return $this->redirectToRoute('critere_index');
        }

        return $this->render('admin/critere/edit.html.twig', [
            'critere' => $critere,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="critere_delete", methods={"DELETE"})
     * @IsGranted("ROLE_SUPER")
     */
    public function delete(Request $request, Critere $critere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$critere->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($critere);
            $entityManager->flush();
            $this->addFlash('success', 'Le critère à été supprimé avec succès');
        }

        return $this->redirectToRoute('critere_index');
    }
}
