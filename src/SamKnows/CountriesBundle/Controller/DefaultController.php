<?php

namespace SamKnows\CountriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SamKnowsCountriesBundle:Default:index.html.twig');
    }
}
