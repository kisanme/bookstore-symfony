<?php

namespace App\Repository;

use App\Entity\Book;
use App\Pagination\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function findLatest(int $page = 1): Paginator
    {
        $qb = $this->createQueryBuilder('b')
            ;

        return (new Paginator($qb))->paginate($page);
    }

    /**
     * Should fetch the books by their corresponding categories
     * 
     */
    public function byCategories(int $type, int $page = 1): Paginator
    {
        $qb = $this->createQueryBuilder('b')
            ->where('b.type = :type')
            ->setParameter('type', $type)
            ;
        return (new Paginator($qb))->paginate($page);
    }

    public function getCategory(int $type): string
    {
        if ($type == 1) {
            return "Fiction";
        } else if ($type == 0) {
            return "Children";
        }
        return '';
    }
}
