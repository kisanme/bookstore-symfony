<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function index(Request $request, BookRepository $bookRepository)
    {
        $categoryBy = $request->query->get('category');
        if ($categoryBy != NULL && ($categoryBy == 1 || $categoryBy == 0)) {
            return $this->byCategories((int) $categoryBy, $bookRepository);
        }

        $books = $bookRepository->findLatest();

        return $this->render('home/index.html.twig', [
            'paginator' => $books,
        ]);
    }

    public function byCategories(int $type, BookRepository $bookRepository): Response
    {
        $books = $bookRepository->byCategories($type);

        return $this->render('home/index.html.twig', [
            'paginator' => $books,
            'category' => $this->getCategory($type)
        ]);
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

    public function detailedBook(Book $book): Response
    {
        return $this->render('home/book_show.html.twig', ['book' => $book]);
    }
}