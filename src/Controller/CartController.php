<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Book;
use App\Entity\Cart;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\InvoiceRepository;

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
    public function addToCart(Book $book, InvoiceRepository $inv)
    {
        // TODO - If the current invoice payment status is null, add to cart adds to the same invoice
        // TODO - If the current invoice isn't there / Payment status is true, add a new invoice
        $em = $this->getDoctrine()->getManager();
        $i = $inv->fetchOrCreateActiveInvoice();
        $cart = new Cart();
        $cart->addBook($book);
        $cart->setInvoice($i);
        $i->addCart($cart);
        $em->persist($cart);
        $payable = $i->getTotalPayable();
        $payable += $book->getPrice();
        $i->setTotalPayable($payable);
        $em->persist($i);
        $em->flush();

        return new Response(print_r($i->getId(), true));
    }

    private function updateTotalInInvoice() {

    }
}
