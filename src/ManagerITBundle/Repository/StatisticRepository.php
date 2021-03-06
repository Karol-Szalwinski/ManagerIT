<?php

namespace ManagerITBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * StatisticRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StatisticRepository extends EntityRepository
{

    public function getLast()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT statistic FROM ManagerITBundle:Statistic statistic ORDER BY statistic.id DESC')
            ->setMaxResults(1)
            ->getResult();
    }
}
