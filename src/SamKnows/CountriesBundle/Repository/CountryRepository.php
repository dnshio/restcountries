<?php
namespace SamKnows\CountriesBundle\Repository;

use Doctrine\ORM\EntityRepository;
use SamKnows\CountriesBundle\Entity\Country;

class CountryRepository extends EntityRepository
{
    public function save(Country $country)
    {
        $this->getEntityManager()->persist($country);
        $this->getEntityManager()->flush($country);
    }

    public function removeAll()
    {
        $q = $this->getEntityManager()->createQueryBuilder()
            ->delete(Country::class, 'c')
            ->getQuery();

        $q->execute();
    }
}