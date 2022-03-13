<?php

namespace App\Repository;

use App\Entity\ChallengeUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChallengeUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChallengeUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChallengeUser[]    findAll()
 * @method ChallengeUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChallengeUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChallengeUser::class);
    }

     /**
      * 
      */
    
    public function findSumPoints($IdUser)
    {
        return $this->createQueryBuilder('cu')
            ->where('cu.Processus = 1')
            ->andWhere('cu.IdUser = :val')
            ->setParameter('val', $IdUser)
            ->join('cu.IdChallenge', 'c')
            ->select('SUM(c.points)as total')
            ->groupBy('cu.IdUser')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findSumEnergy($IdUser)
    {
        return $this->createQueryBuilder('cu')
            ->where('cu.Processus = 1')
            ->andWhere('cu.IdUser = :val')
            ->setParameter('val', $IdUser)
            ->join('cu.IdChallenge', 'c')
            ->join('c.datachallenge', 'd')
            ->select('SUM(d.gain)as total')
            ->groupBy('cu.IdUser')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?ChallengeUser
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
