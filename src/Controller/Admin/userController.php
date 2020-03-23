<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\ProprieteRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class adminController
 * @package App\Controller\Admin
 * Require ROLE_ADMIN for *every* controller method in this class.
 *
 * @Route("/admin/users", name="users_")
 * @IsGranted("ROLE_ADMIN")
 */
class userController extends AbstractController
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * userController constructor.
     * @param UserRepository $repository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(UserRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/users", name="users")
     * @return \Symfony\Component\HttpFoundation\Response
     * @IsGranted("ROLE_ADMIN"))
     */
    public function usersList()
    {
        $users = $this->repository->findAll();
        return $this->render("admin/users/users.html.twig", [
            'users' => $users
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(User $user, Request $request): Response
    {
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Utilisateur modifié avec succès');

            return $this->redirectToRoute('users_users');
        }

        return $this->render('admin/users/edit.html.twig', [
            'editform' => $form->createView()
        ]);

    }
 }