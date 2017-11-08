<?php

namespace ManagerITBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ComputerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ComputerRepository extends EntityRepository
{

    public function CountAllByCurrentMonth()
    {
        $currentMonthYear = date('Y-m') . '%';
        $qb = $this->getEntityManager()->createQueryBuilder();
        $countedInvoices = $qb
            ->select('COUNT(c)')
            ->from('ManagerITBundle:Computer', 'c')
            ->where('c.addDate LIKE :month')
            ->setParameter('month', $currentMonthYear)
            ->getQuery()
            ->getOneOrNullResult();

        return $countedInvoices;
    }
}
