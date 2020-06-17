<?php

namespace App\Repository;

use App\Entity\MaCarotte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MaCarotte|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaCarotte|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaCarotte[]    findAll()
 * @method MaCarotte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaCarotteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaCarotte::class);
    }

    // /**
    //  * @return MaCarotte[] Returns an array of MaCarotte objects
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
    public function findOneBySomeField($value): ?MaCarotte
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
