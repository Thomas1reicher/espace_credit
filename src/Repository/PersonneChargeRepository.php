<?php

namespace App\Repository;

use App\Entity\PersonneCharge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonneCharge|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonneCharge|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonneCharge[]    findAll()
 * @method PersonneCharge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonneChargeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonneCharge::class);
    }

    // /**
    //  * @return PersonneCharge[] Returns an array of PersonneCharge objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonneCharge
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
