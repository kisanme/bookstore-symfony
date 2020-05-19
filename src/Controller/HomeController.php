<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function index(BookRepository $bookRepository)
    {
        $books = $bookRepository->findLatest();

        return $this->render('home/index.html.twig', [
            'paginator' => $books,
        ]);
    }

    public function detailedBook(Book $book): Response
    {
        return $this->render('home/book_show.html.twig', ['book' => $book]);
    }
}