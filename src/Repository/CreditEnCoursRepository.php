<?php

namespace App\Repository;

use App\Entity\CreditEnCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CreditEnCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreditEnCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreditEnCours[]    findAll()
 * @method CreditEnCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreditEnCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreditEnCours::class);
    }

    // /**
    //  * @return CreditEnCours[] Returns an array of CreditEnCours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CreditEnCours
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
