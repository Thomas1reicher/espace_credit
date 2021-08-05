<?php

namespace App\Repository;

use App\Entity\TypePret;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypePret|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypePret|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypePret[]    findAll()
 * @method TypePret[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypePretRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypePret::class);
    }

    // /**
    //  * @return TypePret[] Returns an array of TypePret objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypePret
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
