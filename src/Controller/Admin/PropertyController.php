<?php

namespace App\Controller\Admin;

use App\Entity\Propriete;
use App\Form\ProprieteType;
use App\Repository\ProprieteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class PropertyController
 * @package App\Controller\Admin
 * @Route("/admin/propriete", name="propriete_")
 */
class PropertyController extends AbstractController
{
    /**
     * @var ProprieteRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * PropertyController constructor.
     * @param ProprieteRepository $repository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(ProprieteRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/index", name="index")
     * @return \Symfony\Component\HttpFoundation\Response
     * @IsGranted("ROLE_SUPER")
     */
    public function index()
    {
        $proprietes = $this->repository->findAll();
        return $this->render('admin/propriete/index.html.twig', [
            'properties' => $proprietes,
        ]);
    }

    /**
     * @Route("/admin/propriete/create", name="create")
     * @IsGranted("ROLE_SUPER")
     */
    public function add(Request $request)
    {
        $propriete = new Propriete();
        $form = $this->createForm(ProprieteType::class, $propriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($propriete);
            $this->entityManager->flush();
            $this->addFlash('success', 'Le bien à été crée avec succès.');
            return $this->redirectToRoute('propriete_index');
        }
        return $this->render('admin/propriete/create.html.twig', [
            'propriete' => $propriete,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", methods="GET|POST")
     * @param Propriete $propriete
     * @return \Symfony\Component\HttpFoundation\Response
     * @IsGranted("ROLE_SUPER")
     */
    public function edit(Propriete $propriete, Request $request)
    {
        $form = $this->createForm(ProprieteType::class, $propriete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            $this->addFlash('success', 'Le bien à été modifié avec succès');
            return $this->redirectToRoute('propriete_index');
        }

        return $this->render('admin/propriete/edit.html.twig', [
            'propriete' => $propriete,
            'form' => $form->createView()

        ]);
    }

    /**
     * @Route("/edit/{id}", name="delete", methods="DELETE")
     * @param Propriete $propriete
     * @return \Symfony\Component\HttpFoundation\Response
     * @IsGranted("ROLE_SUPER")
     */
    public function delete(Propriete $propriete, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $propriete->getId(), $request->get('_token'))) {
            $this->entityManager->remove($propriete);
            $this->entityManager->flush();
            $this->addFlash('success', 'Le bien à été supprimé avec succès');
            return $this->redirectToRoute('propriete_index');
        }
    }
}
