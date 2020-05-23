<?php

namespace App\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Book;

class BookRepositoryTest extends KernelTestCase
{
        /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testGetCategory()
    {
        $children = $this->entityManager
            ->getRepository(Book::class)
            ->getCategory(0)
        ;
        $fiction = $this->entityManager
            ->getRepository(Book::class)
            ->getCategory(1)
        ;

        $this->assertEquals('Fiction', $fiction);
        $this->assertEquals('Children', $children);
    }
}
