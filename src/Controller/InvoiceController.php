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
        // If child book category is greater than 5
        $childBooks = $invoice->getChildrenBooks();
        $discount = $invoice->getFivePercentDiscount();
        if ($discount == false) {
            if ($childBooks->count() >= 2) {
                $discount = new Discount;
                $discount->setName('10% discount from the Children books total');
                $discount->setType(1);
                $discount->setInvoice($invoice);
                $discount->setPercentage(5);
                $invoice->addDiscount($discount);
                $discountAmount = 0;
                foreach($childBooks as $b) {
                    $discountAmount += $b->getPrice();
                }
                $discountAmount = $discountAmount * 0.05;
                $discount->setAmount($discountAmount);
                $em->persist($discount);
                $em->persist($invoice);
                $em->flush();
            }
        } else {
            if ($childBooks->count() < 2) {
                $invoice->removeDiscount($discount);
                $em->remove($discount);
                $em->persist($invoice);
                $em->flush();
            } else {
                // Recalculate discount
                $discountAmount = 0;
                foreach($childBooks as $b) {
                    $discountAmount += $b->getPrice();
                }
                $discountAmount = $discountAmount * 0.05;
                $discount->setAmount($discountAmount);
                $em->persist($discount);
                $em->flush();
            }
        }
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
