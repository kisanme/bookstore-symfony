<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function index(BookRepository $bookRepository)
    {
        $books = $bookRepository->findAll();

        return $this->render('index.html.twig', [
            'paginator' => $books,
        ]);
    }
}