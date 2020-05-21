<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Book;
use App\Service\InvoicedResponse;
use App\Repository\BookRepository;
use App\Repository\InvoiceRepository;
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
    public function index(
        Request $request,
        BookRepository $bookRepository,
        InvoiceRepository $invoiceRepository,
        InvoicedResponse $r
    ): Response
    {
        $responseData = $r->initializeResponse();
        $categoryBy = $request->query->get('category');

        /**
         * When filtering is available
         */
        if ($categoryBy != NULL && ($categoryBy == 1 || $categoryBy == 0)) {
            $responseData['paginator'] = $bookRepository->byCategories((int) $categoryBy);
            $responseData['category'] = $bookRepository->getCategory((int) $categoryBy);
        } else {
            $responseData['paginator'] = $bookRepository->findLatest();
        }

        return $this->render('home/index.html.twig', $responseData);
    }

    /**
     * @Route("/book/{id}", name="detailed_book", methods={"GET"})
     */
    public function detailedBook(
        Book $book,
        InvoiceRepository $invoiceRepository,
        InvoicedResponse $r
    ): Response
    {
        $responseData = $r->initializeResponse();
        $responseData['book'] = $book;
        return $this->render('home/book_show.html.twig', $responseData);
    }
}