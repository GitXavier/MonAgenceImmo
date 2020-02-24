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
     * @Route("/admin", name="admin.propriete.index")
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
     * @Route("/admin/{id}, name="admin.propriete.index")
     */
    public function edit(Propriete $propriete)
    {
        return $this->render(':Admin/propriete/edit.html.twig', [
            'propriete' => $propriete
        ]);
    }
}
