<?php

namespace App\Repository;

use App\Entity\SousTauxPeriode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SousTauxPeriode|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousTauxPeriode|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousTauxPeriode[]    findAll()
 * @method SousTauxPeriode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousTauxPeriodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousTauxPeriode::class);
    }

    // /**
    //  * @return SousTauxPeriode[] Returns an array of SousTauxPeriode objects
    //  */
 
    public function findByValue($val1 , $val2 , $val3)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.montant_min <= :val')
            ->setParameter('val', $val3)
            ->andWhere('s.montant_max >= :val')
            ->setParameter('val', $val3)
            ->leftJoin('s.id_soustaux_id', 'st')
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }
 

    /*
    public function findOneBySomeField($value): ?SousTauxPeriode
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
