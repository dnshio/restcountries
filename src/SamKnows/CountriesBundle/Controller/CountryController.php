<?php
namespace SamKnows\CountriesBundle\Controller;

use SamKnows\CountriesBundle\Repository\CountryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route(service="sam_knows_countries.controller.country")
 */
class CountryController
{
    /**
     * @var CountryRepository
     */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }
    /**
     * @Route("/country", name="country_index")
     * @Method({"GET"})
     * @return Response
     */
    public function indexAction()
    {
        return new JsonResponse($this->countryRepository->findAllOrdered());
    }
}