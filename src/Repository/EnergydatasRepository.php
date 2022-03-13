<?php

namespace App\Repository;

use App\Entity\Energydatas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Energydatas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Energydatas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Energydatas[]    findAll()
 * @method Energydatas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnergydatasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Energydatas::class);
    }

    // /**
    //  * @return Energydatas[] Returns an array of Energydatas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Energydatas
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
