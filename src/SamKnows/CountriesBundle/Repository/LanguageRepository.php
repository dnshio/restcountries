<?php
namespace SamKnows\CountriesBundle\Repository;

use Doctrine\ORM\EntityRepository;
use SamKnows\CountriesBundle\Entity\Language;

class LanguageRepository extends EntityRepository
{
    /**
     * @param $code
     * @return Language
     */
    public function findOrCreate($code)
    {
        $language = $this->findOneByCode($code);
        if (!$language) {
            $language = new Language($code);
            $this->getEntityManager()->persist($language);
            $this->getEntityManager()->flush($language);
        }
        return $language;
    }
}