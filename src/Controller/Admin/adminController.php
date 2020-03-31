<?php


namespace App\Controller\Admin;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class adminController
 * @package App\Controller\Admin
 *
 * @Route("/admin/index", name="admin_")
 * @IsGranted("ROLE_SUPER")
 */
class adminController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="index")
     */
    public function dashBoard()
    {
        return $this->render('admin/dashboard/index.html.twig');
    }
}