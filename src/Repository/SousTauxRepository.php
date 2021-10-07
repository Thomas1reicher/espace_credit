<?php

namespace App\Repository;

use App\Entity\SousTaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SousTaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousTaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousTaux[]    findAll()
 * @method SousTaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousTauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousTaux::class);
    }

    // /**
    //  * @return SousTaux[] Returns an array of SousTaux objects
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
    public function findOneBySomeField($value): ?SousTaux
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
