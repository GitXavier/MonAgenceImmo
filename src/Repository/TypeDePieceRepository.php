<?php

namespace App\Repository;

use App\Entity\TypeDePiece;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeDePiece|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeDePiece|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeDePiece[]    findAll()
 * @method TypeDePiece[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeDePieceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeDePiece::class);
    }

    // /**
    //  * @return TypeDePiece[] Returns an array of TypeDePiece objects
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
    public function findOneBySomeField($value): ?TypeDePiece
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
