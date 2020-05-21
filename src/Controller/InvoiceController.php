<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Discount;
use App\Service\InvoicedResponse;
use App\Repository\InvoiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends AbstractController
{
    /**
     * @Route("/invoice", name="invoice")
     */
    public function index()
    {
        return $this->render('invoice/index.html.twig', [
            'controller_name' => 'InvoiceController',
        ]);
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function cart(InvoicedResponse $r, InvoiceRepository $inv)
    {
        $res = $r->initializeResponse();
        $em = $this->getDoctrine()->getManager();
        $invoice = $res['invoice'];
        if ($invoice == NULL) {
            return $this->redirectToRoute('index');
        }
        $res['cart_items'] = $invoice->getBooks();
        // If both categories are equal to 10
        return $this->render('cart/index.html.twig', $res);
    }

    /**
     * @Route("/add-to-cart/{book}", name="add_to_cart", methods={"POST"})
     */
    public function addToCart(Book $book, InvoiceRepository $inv)
    {
        $i = $inv->addToCart($book);

        return new Response((string) $i->getId(), 200);
    }

    /**
     * @Route("/remove-from-cart/{book}", name="remove_from_cart", methods={"POST"})
     */
    public function removeFromCart(Book $book, InvoiceRepository $inv)
    {
        $i = $inv->removeFromCart($book);

        return new Response((string) $i->getId(), 200);
    }
}
