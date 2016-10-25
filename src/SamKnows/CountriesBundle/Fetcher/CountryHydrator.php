<?php
namespace SamKnows\CountriesBundle\Fetcher;

use SamKnows\CountriesBundle\Entity\Country;
use SamKnows\CountriesBundle\Entity\Translation;
use SamKnows\CountriesBundle\Repository\LanguageRepository;

class CountryHydrator
{
    /**
     * @var LanguageRepository
     */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    /**
     * @param array $c
     * @return Country
     */
    public function hydrate(array $c)
    {
        $country = new Country();
        $country->setName($c['name']);
        $country->setIso2($c['alpha2Code']);
        $country->setIso3($c['alpha3Code']);
        $country->setTld($c['topLevelDomain'][0]);

        if (array_key_exists('latlng', $c) && count($c['latlng']) > 1) {
            $country->setLatitude($c['latlng'][0]);
            $country->setLongitude($c['latlng'][1]);
        }

        foreach ($c['languages'] as $code) {
            $country->addLanguage($this->languageRepository->findOrCreate($code));
        }

        foreach ($c['translations'] as $languageCode => $translation) {
            if ($translation == null) {
                continue;
            }
            $language = $this->languageRepository->findOrCreate($languageCode);
            $t = new Translation($country, $language, $translation);
            $t->setCountry($country);
            $country->addTranslation($t);
        }
        return $country;
    }

}
