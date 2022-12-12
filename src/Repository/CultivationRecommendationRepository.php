<?php

namespace App\Repository;

use App\ApiResource\CultivationRecommendation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CultivationRecommendation>
 *
 * @method CultivationRecommendation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CultivationRecommendation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CultivationRecommendation[]    findAll()
 * @method CultivationRecommendation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CultivationRecommendationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CultivationRecommendation::class);
    }

    public function save(CultivationRecommendation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CultivationRecommendation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CultivationRecommendation[] Returns an array of CultivationRecommendation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CultivationRecommendation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
