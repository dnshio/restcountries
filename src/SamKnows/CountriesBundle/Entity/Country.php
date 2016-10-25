<?php
namespace SamKnows\CountriesBundle\Entity;

class Country
{
    /**
     * @var string
     */
    private $iso2;

    /**
     * @var string
     */
    private $iso3;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $tld;

    /**
     * @var Language[]
     */
    private $languages = [];

    /**
     * @var Translation[]
     */
    private $translations = [];

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $borders;

    /**
     * @return string
     */
    public function getIso2()
    {
        return $this->iso2;
    }

    /**
     * @param string $iso2
     */
    public function setIso2($iso2)
    {
        $this->iso2 = $iso2;
    }

    /**
     * @return string
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * @param string $iso3
     */
    public function setIso3($iso3)
    {
        $this->iso3 = $iso3;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * @param string $tld
     */
    public function setTld($tld)
    {
        $this->tld = $tld;
    }

    /**
     * @return array
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param array $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    public function addLanguage(Language $language)
    {
        $this->languages[] = $language;
    }

    /**
     * @return string
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @param string $translations
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;
    }

    public function addTranslation(Translation $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return string
     */
    public function getBorders()
    {
        return $this->borders;
    }

    /**
     * @param string $borders
     */
    public function setBorders($borders)
    {
        $this->borders = $borders;
    }

}
