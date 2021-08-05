<?php

namespace App\Repository;

use App\Entity\Demandecredit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Demandecredit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Demandecredit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Demandecredit[]    findAll()
 * @method Demandecredit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandecreditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demandecredit::class);
    }

    // /**
    //  * @return Demandecredit[] Returns an array of Demandecredit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Demandecredit
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
