<?php

namespace App\Repository;

use App\Entity\Credit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Credit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Credit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Credit[]    findAll()
 * @method Credit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Credit::class);
    }

    // /**
    //  * @return Credit[] Returns an array of Credit objects
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


    public function findCredit($value)
    {
        $db = $this->createQueryBuilder('c')
            ->select('p.taeg')
            ->andWhere('c.id = :val')
            ->setParameter('val', $value)
            ->Join('c.taux', 't')
            ->Join('t.sous_taux', 's')
            ->Join('s.sous_taux_period', 'p')
            ->orderBy('p.taeg', 'ASC')
            ->getQuery()
            ->getResult()
        ;
        return $db;
    }
    public function findTaeg($val1,$val2,$val3)
    {
        $db = $this->createQueryBuilder('c')
            ->select('p.taeg')
            ->Join('c.taux', 't')
            ->andWhere('t.id = :val')
            ->setParameter('val', $val1)
            ->Join('t.sous_taux', 's')
            ->andWhere('s.periode_deb = :val1')
            ->setParameter('val1', $val2)
            ->Join('s.sous_taux_period', 'p')
            ->andWhere('p.montant_min <= :val2')
            ->andWhere('p.montant_max >= :val2')
            ->setParameter('val2', $val3)
            ->orderBy('p.taeg', 'ASC')
            ->getQuery()
            ->getResult()
        ;
        return $db;
    }

    public function findMois($val1,$val3)
    {
        $db = $this->createQueryBuilder('c')
            ->select('s.periode_deb')
            ->Join('c.taux', 't')
            ->andWhere('t.id = :val')
            ->setParameter('val', $val1)
            ->Join('t.sous_taux', 's')
            ->Join('s.sous_taux_period', 'p')
            ->andWhere('p.montant_min <= :val2')
            ->andWhere('p.montant_max >= :val2')
            ->setParameter('val2', $val3)
            ->orderBy('p.taeg', 'ASC')
            ->getQuery()
            ->getResult()
        ;
        return $db;
    }
    public function findMinTaeg($val2)
    {
        $db = $this->createQueryBuilder('c')
            ->select('p.taeg')
            ->andWhere('c.id = :val1')
            ->setParameter('val1', $val2)
            ->Join('c.taux', 't')
            ->Join('t.sous_taux', 's')
            ->Join('s.sous_taux_period', 'p')
            ->orderBy('p.taeg', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;

        if(count($db)>0){
        return $db[0]["taeg"];
        }
        else{
            return null;
        }
    }
    
}
