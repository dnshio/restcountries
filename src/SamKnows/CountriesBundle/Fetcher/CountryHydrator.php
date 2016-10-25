<?php
namespace SamKnows\CountriesBundle\Fetcher;

use SamKnows\CountriesBundle\Entity\Country;
use SamKnows\CountriesBundle\Entity\Translation;
use SamKnows\CountriesBundle\Repository\LanguageRepository;

class CountryHydrator
{
    const NAME_KEY = 'name';
    const ISO2_KEY = 'alpha2Code';
    const ISO3_KEY = 'alpha3Code';
    const TLD_KEY = 'topLevelDomain';
    const LATLONG_KEY = 'latlng';
    const LANGUAGES_KEY = 'languages';
    const TRANSLATIONS_KEY = 'translations';
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
        $country->setName($c[self::NAME_KEY]);
        $country->setIso2($c[self::ISO2_KEY]);
        $country->setIso3($c[self::ISO3_KEY]);
        $country->setTld($c[self::TLD_KEY][0]);

        if (array_key_exists(self::LATLONG_KEY, $c) && count($c[self::LATLONG_KEY]) > 1) {
            $country->setLatitude($c[self::LATLONG_KEY][0]);
            $country->setLongitude($c[self::LATLONG_KEY][1]);
        }

        foreach ($c[self::LANGUAGES_KEY] as $code) {
            $country->addLanguage($this->languageRepository->findOrCreate($code));
        }

        foreach ($c[self::TRANSLATIONS_KEY] as $languageCode => $translation) {
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
