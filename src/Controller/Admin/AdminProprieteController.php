<?php

namespace App\Controller\Admin;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AdminProprieteController extends AbstractController
{
    /**
     * @var ProprieteRepository
     */
    private $repository;

    /**
     * AdminProprieteController constructor.
     * @param ProprieteRepository $repository
     */
    public function __construct(ProprieteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin_propriete_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $proprietes = $this->repository->findAll();
        return $this->render('admin/propriete/index.html.twig', [
            'proprietes' => $proprietes,
        ]);
    }

    /**
     * @Route("/admin/{id}", name="admin_propriete_edit")
     */
    public function edit(Propriete $propriete)
    {
        return $this->render('admin/propriete/edit.html.twig', [
            'propriete' => $propriete,
        ]);
    }
}
