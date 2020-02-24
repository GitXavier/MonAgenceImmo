<?php

namespace App\Controller\Admin;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class AdminProprieteController
 * @package App\Controller\Admin
 * @Route("/admin/property", name="property_")
 */
class PropertyController extends AbstractController
{
    /**
     * @var ProprieteRepository
     */
    private $repository;

    /**
     * PropertyController constructor.
     * @param ProprieteRepository $repository
     */
    public function __construct(ProprieteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/index", name="index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $proprietes = $this->repository->findAll();
        return $this->render('Admin/property/index.html.twig', [
            'proprietes' => $proprietes,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Propriete $property)
    {
        return $this->render(':Admin/property/edit.html.twig', [
            'property' => $property
        ]);
    }
}
