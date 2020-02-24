<?php

namespace App\Controller;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProprieteController extends AbstractController
{
    /**
     * @var ProprieteRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(ProprieteRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/propriete", name="propriete")
     * @return Response
     */
    public function index(): Response
    {
        $proprietes = $this->repository->findLatest();
        return $this->render('propriete/index.html.twig', [
            'proprietes' => $proprietes
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="propriete.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Propriete $propriete
     * @return Response
     */
    public function show(Propriete $propriete, string $slug): Response
    {
       if ($propriete->getSlug() !== $slug) {
           return $this->redirectToRoute('propriete.show', [
               'id' => $propriete->getId(),
               'slug' => $propriete->getSlug()
           ], 301);
       }
        return $this->render('propriete/show.html.twig', [
            'propriete' => $propriete
        ]);
    }
}
