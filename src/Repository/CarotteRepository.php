<?php

namespace App\Repository;

use App\Entity\Carotte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Carotte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carotte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carotte[]    findAll()
 * @method Carotte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarotteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carotte::class);
    }

    // /**
    //  * @return Carotte[] Returns an array of Carotte objects
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

    /*
    public function findOneBySomeField($value): ?Carotte
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
