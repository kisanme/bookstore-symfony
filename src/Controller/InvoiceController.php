<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Discount;
use App\Entity\Coupon;
use App\Entity\Invoice;
use App\Form\CouponCodeType;
use App\Service\InvoicedResponse;
use App\Repository\InvoiceRepository;
use App\Repository\DiscountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends AbstractController
{
    /**
     * @Route("/invoice", name="invoice")
     */
    public function index(
        Request $request,
        InvoicedResponse $r,
        InvoiceRepository $inv,
        DiscountRepository $dr
    )
    {
        $res = $r->initializeResponse();
        $em = $this->getDoctrine()->getManager();
        $invoice = $res['invoice'];

        if ($invoice == NULL) {
            return $this->redirectToRoute('index');
        }

        $couponForm = $this->couponForm($invoice);
        $res['coupon'] = $invoice->getCoupon();

        // Refreshes the calculation on loading to the template
        if (! $res['coupon']) {
            $inv->tenPercentDiscountManager($invoice);
            $inv->fivePercentDiscountManager($invoice);
            $inv->refreshNetTotal($invoice);
        }

        $res['cart_items'] = $invoice->getBooks();

        $couponForm->handleRequest($request);
        if ($couponForm->isSubmitted() && $couponForm->isValid()) {
            $coupon = $couponForm->getData();
            // Calculate the coupon amount here
            $coupon->setAmount($invoice->getTotalPayable() * 0.15);
            $dr->removeAllDiscountForInvoice($invoice);
            $em->persist($coupon);
            $em->persist($invoice);
            $em->flush();

            return $this->redirectToRoute('invoice');
        }

        $res['coupon_form'] = $couponForm->createView();

        return $this->render('invoice/index.html.twig', $res);
    }

    private function couponForm(Invoice $inv): FormInterface
    {
        $coupon = new Coupon;
        $coupon->setPercentage(15);
        $coupon->setAmount(0);
        $coupon->setInvoice($inv);

        return $this->createForm(CouponCodeType::class, $coupon, [
            // 'action' => $this->generateUrl('add_coupon_to_invoice')
        ]);
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
