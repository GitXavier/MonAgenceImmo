<?php

namespace App\Controller\Admin;

use App\Entity\Propriete;
use App\Form\ProprieteType;
use App\Repository\ProprieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class PropertyController
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
        return $this->render('admin/property/index.html.twig', [
            'properties' => $proprietes,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     * @param Propriete $propriete
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function edit(Propriete $propriete)
    {
        $form = $this->createForm(ProprieteType::class, $propriete);
        return $this->render('admin/property/edit.html.twig', [
            'property' => $propriete,
            'form' => $form->createView()

        ]);
    }

}
