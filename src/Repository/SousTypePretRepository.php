<?php

namespace App\Repository;

use App\Entity\SousTypePret;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SousTypePret|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousTypePret|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousTypePret[]    findAll()
 * @method SousTypePret[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousTypePretRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousTypePret::class);
    }

    // /**
    //  * @return SousTypePret[] Returns an array of SousTypePret objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SousTypePret
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
