<?php

namespace App\Repository;

use App\Entity\MonAnnonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MonAnnonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method MonAnnonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method MonAnnonce[]    findAll()
 * @method MonAnnonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MonAnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MonAnnonce::class);
    }

    public function findAvailableAnnonce(){
        return $this->createQueryBuilder('MonAnnonce')
            ->andWhere('MonAnnonce.Statut = 1')
            ->orderBy('MonAnnonce.Date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findAvailableAnnonceByProfil($userId){
        return $this->createQueryBuilder('MonAnnonce')
            ->andWhere('MonAnnonce.Statut = 1')
            ->andWhere('MonAnnonce.User = ' . $userId)
            ->orderBy('MonAnnonce.Date', 'DESC')
            ->getQuery()
            ->getResult();
    }
    // /**
    //  * @return MonAnnonce[] Returns an array of MonAnnonce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MonAnnonce
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
