<?php

namespace App\Controller;

use App\Entity\Propriete;
use App\Repository\ProprieteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    private $entityManager;

    public function __construct(ProprieteRepository $repository,EntityManagerInterface $entityManager)
    {
       $this->repository = $repository;
       $this->entityManager = $entityManager;
    }

    /**
     * @Route("/property", name="property")
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $proprietes = $paginator->paginate(
            $this->repository->findAllVisibleQuery(),
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('property/index.html.twig', [
            'proprietes' => $proprietes
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Propriete $propriete
     * @return Response
     */
    public function show(Propriete $propriete, string $slug): Response
    {
        if ($propriete->getSlug() !== $slug) {
            return $this->redirectToRoute('property.show', [
                'id' => $propriete->getId(),
                'slug' => $propriete->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig', [
            'property' => $propriete
        ]);
    }
}
