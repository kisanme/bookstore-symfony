<?php

namespace App\Controller;

use App\Entity\Book;
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
    public function cart()
    {
        return $this->render('invoice/index.html.twig', [
            'controller_name' => 'InvoiceController',
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
        $i->addBook($book);
        $payable = $i->getTotalPayable();
        $payable += $book->getPrice();
        $i->setTotalPayable($payable);
        $em->persist($i);
        $em->flush();

        return new Response((string) $i->getId(), 200);
    }

    /**
     * @Route("/remove-from-cart/{book}", name="remove_from_cart", methods={"POST"})
     */
    public function removeFromCart(Book $book, InvoiceRepository $inv)
    {
        // TODO - If the current invoice payment status is null, add to cart adds to the same invoice
        // TODO - If the current invoice isn't there / Payment status is true, add a new invoice
        $em = $this->getDoctrine()->getManager();
        $i = $inv->fetchOrCreateActiveInvoice();
        $i->removeBook($book);
        $payable = $i->getTotalPayable();
        $payable -= $book->getPrice();
        $i->setTotalPayable($payable);
        // If there are no books in invoice delete the invoice
        if ($i->getBooks()->count() == 0) {
            $em->remove($i);
        } else {
            $em->persist($i);
        }
        $em->flush();

        return new Response((string) $i->getId(), 200);
    }
}
