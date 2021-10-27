<?php

namespace App\Repository;

use App\Entity\Taux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Taux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Taux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Taux[]    findAll()
 * @method Taux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Taux::class);
    }

    // /**
    //  * @return Taux[] Returns an array of Taux objects
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
    public function findOneBySomeField($value): ?Taux
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findMinTaeg($val2)
    {
        $db = $this->createQueryBuilder('t')
            ->select('p.taeg')
            ->andWhere('t.id = :val1')
            ->setParameter('val1', $val2)
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
    function array_to_string($array) {
        foreach ($array as $a=>$b) $c[]=$a.'='.$b;
        return implode(', ',$c);
     }
    public function findMinMontant($val2)
    {
        $db = $this->createQueryBuilder('t')
            ->select('p.taeg')
            ->andWhere('t.id = :val1')
            ->setParameter('val1', $val2)
            ->Join('t.sous_taux', 's')
            ->Join('s.sous_taux_period', 'p')
            ->orderBy('p.montant_min', 'ASC')
            ->getQuery()
            ->getResult()
        ;
        return $db;
    }
    public function findMinPeriod($val2)
    {
        $db = $this->createQueryBuilder('t')
            ->select('p.taeg')
            ->andWhere('t.id = :val1')
            ->setParameter('val1', $val2)
            ->Join('t.sous_taux', 's')
            ->orderBy('s.periode_deb', 'ASC')
            ->getQuery()
            ->getResult()
        ;
        return $db;
    }
}
