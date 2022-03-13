<?php

namespace App\Repository;

use App\Entity\Challenges;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Challenges|null find($id, $lockMode = null, $lockVersion = null)
 * @method Challenges|null findOneBy(array $criteria, array $orderBy = null)
 * @method Challenges[]    findAll()
 * @method Challenges[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class ChallengesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Challenges::class);
    }

    /**
     * @return Challenges[] Returns an array of Challenges objects
     **/

    public function findByChallengeNotDone($val1, $val2)
    {

        $connection = $this->getEntityManager()->getConnection();

        $results = $connection->fetchAllAssociative("SELECT * FROM `challenges` 
        WHERE challenges.`id` NOT IN (
            SELECT challenge_user.id_challenge_id 
            FROM challenge_user
            WHERE challenge_user.id_user_id = :val1 )
        AND challenges.niveau = :val2", ["val1" => $val1, "val2" => $val2]);

        return $results;
    }


    
    public function findByChallenge($query){
        return $this
        ->createQueryBuilder('c')
        ->select('c')
        ->orderBy('c.description', 'asc')
        ->where('c.description LIKE :query')
        ->setParameter('query', '%' . $query . '%')
        ->getQuery()
        ->getArrayResult()
        ;
    }
    
}