<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PropertyController
 * @package App\Controller
 *
 * @Route("/proprietes", name="site_properties_")
 */
class PropertyController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="index")
     */
    public function index() {
        return $this->render('Site/Properties.html.twig');
    }

    /**
     * @Route("/{id}", name="property")
     */
    public function property() {
        return $this->render('Site/Property.html.twig');
    }
}