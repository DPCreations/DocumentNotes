<?php

namespace App\Repository;

use App\Entity\ParagraphComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParagraphComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParagraphComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParagraphComment[]    findAll()
 * @method ParagraphComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParagraphCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParagraphComment::class);
    }

    // /**
    //  * @return ParagraphComment[] Returns an array of ParagraphComment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParagraphComment
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
