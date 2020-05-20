<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Book;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index()
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }

    /**
     * @Route("/add-to-cart/{book}", name="add_to_cart", methods={"POST"})
     */
    public function addToCart(Book $book)
    {
        return new Response(print_r($book, true));
    }
}
