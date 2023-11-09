<?php

namespace App\Repository;

use App\Entity\SkillProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SkillProject>
 *
 * @method SkillProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillProject[]    findAll()
 * @method SkillProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillProject::class);
    }

//    /**
//     * @return SkillProject[] Returns an array of SkillProject objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SkillProject
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
