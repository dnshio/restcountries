<?php
namespace SamKnows\CountriesBundle\Fetcher;

use GuzzleHttp\Client;
use SamKnows\CountriesBundle\Repository\CountryRepository;

class CountryFetcher
{
    const ENDPOINT = 'https://restcountries.eu/rest/v1/all';
    /**
     * @var Client
     */
    private $client;
    /**
     * @var CountryRepository
     */
    private $countryRepository;
    /**
     * @var CountryHydrator
     */
    private $countryHydrator;

    public function __construct(Client $client, CountryRepository $countryRepository, CountryHydrator $countryHydrator)
    {
        $this->client = $client;
        $this->countryRepository = $countryRepository;
        $this->countryHydrator = $countryHydrator;
    }

    public function fetch()
    {
        $response = $this->client->get(self::ENDPOINT);

        $this->countryRepository->removeAll();

        foreach (json_decode($response->getBody(), true) as $rawCountry) {

            $this->countryRepository->save($this->countryHydrator->hydrate($rawCountry));

        }
    }
    
    
}
