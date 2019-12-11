<?php

namespace App\Repository;

use App\Entity\TestEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TestEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestEntity[]    findAll()
 * @method TestEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestEntity::class);
    }

    // /**
    //  * @return TestEntity[] Returns an array of TestEntity objects
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

    public function findOneByTestField1($value): ?TestEntity
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.test_field1 = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
