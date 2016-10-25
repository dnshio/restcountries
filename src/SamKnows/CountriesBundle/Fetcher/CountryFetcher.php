<?php
namespace SamKnows\CountriesBundle\Fetcher;

use GuzzleHttp\Client;
use SamKnows\CountriesBundle\Entity\Country;
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

        $rawCountries = json_decode($response->getBody(), true);

        foreach ($rawCountries as $rawCountry) {
            $this->countryRepository->save($this->countryHydrator->hydrate($rawCountry));
        }
        
        // Resolve borders
        foreach ($rawCountries as $rawCountry) {
            /** @var Country $country */
            $country = $this->countryRepository->findOneByIso2($rawCountry['alpha2Code']);
            foreach ($rawCountry['borders'] as $countryCode) {
                $border = $this->countryRepository->findOneByIso3($countryCode);
                $country->addBorder($border);
            }
            $this->countryRepository->save($country);
        }
    }
    
    
}
