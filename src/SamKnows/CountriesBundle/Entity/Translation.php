<?php
namespace SamKnows\CountriesBundle\Entity;

class Translation implements \JsonSerializable
{
    /**
     * @var int;
     */
    private $id;

    /**
     * @var Country
     */
    private $country;

    /**
     * @var Language
     */
    private $language;

    /**
     * @var string
     */
    private $translation;

    public function __construct(Country $country = null, Language $language = null, $translation = null)
    {
        $this->country = $country;
        $this->language = $language;
        $this->translation = $translation;
    }

    function jsonSerialize()
    {
        return [
            $this->language->getCode() => $this->translation
        ];
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * @param string $translation
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;
    }

}
