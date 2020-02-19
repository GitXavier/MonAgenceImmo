<?php

namespace App\Repository;

use App\Entity\Proximite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Proximite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proximite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proximite[]    findAll()
 * @method Proximite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProximiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proximite::class);
    }

    // /**
    //  * @return Proximite[] Returns an array of Proximite objects
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
    public function findOneBySomeField($value): ?Proximite
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
