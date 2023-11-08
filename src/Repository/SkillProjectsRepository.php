<?php

namespace App\Repository;

use App\Entity\SkillProjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SkillProjects>
 *
 * @method SkillProjects|null find($id, $lockMode = null, $lockVersion = null)
 * @method SkillProjects|null findOneBy(array $criteria, array $orderBy = null)
 * @method SkillProjects[]    findAll()
 * @method SkillProjects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SkillProjectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillProjects::class);
    }

//    /**
//     * @return SkillProjects[] Returns an array of SkillProjects objects
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

//    public function findOneBySomeField($value): ?SkillProjects
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
