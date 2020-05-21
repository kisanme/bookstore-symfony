<?php

namespace App\Repository;

use \DateTime;
use App\Entity\Book;
use App\Entity\Discount;
use App\Entity\Invoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Invoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method Invoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method Invoice[]    findAll()
 * @method Invoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvoiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Invoice::class);
        $this->min_books_five_percent_discount = 2;
    }

    public function fetchOrCreateActiveInvoice(): Invoice
    {
        $entityManager = $this->getEntityManager();
        $inv = $this->findOneBy([
            'user' => 1,
            'payment_status' => false
        ]);

        // If the result is empty
        if (!$inv) {
            $inv = new Invoice();
            $inv->setUser(1);
            $inv->setInvoiceDate(new DateTime());
            $inv->setPaymentStatus(false);
            $inv->setTotalPayable(0);
            $entityManager->persist($inv);
            $entityManager->flush();
        }
        return $inv;
    }

    public function activeInvoice(): ?Invoice
    {
        $entityManager = $this->getEntityName();
        return $this->findOneBy([
            'user' => 1,
            'payment_status' => false
        ]);
    }

    /**
     * @return Invoice Returns the Invoice object for which the cart item was added to
     */
    public function addToCart(Book $book): Invoice
    {
        $em = $this->getEntityManager();
        $i = $this->fetchOrCreateActiveInvoice();
        $book->getInvoices()->add($i);
        $i->getBooks()->add($book);
        $payable = $i->getTotalPayable();
        $payable += $book->getPrice();
        $i->setTotalPayable($payable);
        $em->persist($i);
        $em->flush($i);

        $this->fivePercentDiscount($i);
        return $i;
    }

    /**
     * @return Invoice Returns the Invoice object from which the cart item was removed
     */
    public function removeFromCart(Book $book): Invoice
    {
        $em = $this->getEntityManager();
        $i = $this->fetchOrCreateActiveInvoice();
        $book->getInvoices()->removeElement($i);
        $i->getBooks()->removeElement($book);
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

        $this->fivePercentDiscount($i);
        return $i;
    }

    protected function fivePercentDiscount(Invoice $invoice)
    {
        $em = $this->getEntityManager();
        // If child book category is greater than 5
        $childBooks = $invoice->getChildrenBooks();
        $discount = $invoice->getFivePercentDiscount();
        if ($discount == false) {
            if ($childBooks->count() >= $this->min_books_five_percent_discount) {
                $discount = new Discount;
                $discount->setName('10% discount from the Children books total');
                $discount->setType(1);
                $discount->setInvoice($invoice);
                $discount->setPercentage(5);
                $invoice->getDiscounts()->add($discount);
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
            if ($childBooks->count() < $this->min_books_five_percent_discount) {
                $invoice->getDiscounts()->removeElement($discount);
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
    }
}
