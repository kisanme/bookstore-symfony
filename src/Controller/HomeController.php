<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Book;
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
    public function index(Request $request, BookRepository $bookRepository, InvoiceRepository $invoiceRepository)
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
        $responseData['invoice'] = $invoiceRepository->activeInvoice();

        return $this->render('home/index.html.twig', $responseData);
    }

    /**
     * @Route("/book/{id}", name="detailed_book", methods={"GET"})
     */
    public function detailedBook(Book $book, InvoiceRepository $invoiceRepository): Response
    {
        return $this->render('home/book_show.html.twig', [
            'book' => $book,
            'invoice' => $invoiceRepository->activeInvoice()
        ]);
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