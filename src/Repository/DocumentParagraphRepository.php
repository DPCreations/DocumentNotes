<?php

namespace App\Repository;

use App\Entity\DocumentParagraph;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentParagraph|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentParagraph|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentParagraph[]    findAll()
 * @method DocumentParagraph[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentParagraphRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentParagraph::class);
    }

    // /**
    //  * @return DocumentParagraph[] Returns an array of DocumentParagraph objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentParagraph
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
