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
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(Request $request, BookRepository $bookRepository)
    {
        $responseData = [];
        $categoryBy = $request->query->get('category');

        /**
         * When filtering is available
         */
        if ($categoryBy != NULL && ($categoryBy == 1 || $categoryBy == 0)) {
            $responseData['paginator'] = $bookRepository->byCategories((int) $categoryBy);
            $responseData['category'] = $this->getCategory((int) $categoryBy);
        } else {
            $responseData['paginator'] = $bookRepository->findLatest();
        }

        return $this->render('home/index.html.twig', $responseData);
    }

    /**
     * @Route("/add-to-cart/{book}", name="add_to_cart", methods={"GET","POST"})
     */
    public function addToCart(Book $book)
    {
        return new Response(print_r($book, true));
    }

    /**
     * @Route("/book/{id}", name="detailed_book", methods={"GET"})
     */
    public function detailedBook(Book $book): Response
    {
        return $this->render('home/book_show.html.twig', ['book' => $book]);
    }

    private function getCategory(int $type): string
    {
        if ($type == 1) {
            return "Fiction";
        } else if ($type == 0) {
            return "Children";
        }
        return '';
    }
}