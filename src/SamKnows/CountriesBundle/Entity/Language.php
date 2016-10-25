<?php
namespace SamKnows\CountriesBundle\Entity;

class Language
{
    /**
     * @var string
     */
    private $code;

    public function __construct($code = '')
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
    
}