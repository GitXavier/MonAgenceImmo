<?php


namespace App\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertiesListingController extends AbstractController
{
    /**
     * @Route("/propertiesListing", name="propertiesListing")
     */
    public function index()
    {
        return $this->render('Site/properties_listing.html.twig');
    }
}