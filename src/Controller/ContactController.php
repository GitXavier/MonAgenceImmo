<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ContactController
 * @package App\Controller
 *
 * @Route("/contact", name="site_contact_")
 */
class ContactController extends AbstractController
{
    /**
     * @return Response
     *
     * @Route("/", name="index")
     */
    public function index() {
        return $this->render('Site/Contact.html.twig');
    }
}