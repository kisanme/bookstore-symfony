<?php

namespace App\Repository;

use App\Entity\Discount;
use App\Entity\Invoice;
use Doctrine\Common\Collections\Collection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Discount|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discount|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discount[]    findAll()
 * @method Discount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Discount::class);
    }

    /**
     * Creates a new 10% discount entry for a given invoice
     * and saves the entity and association on the database (discount and invoice tables are modified)
     * 
     * @param Invoice The invoice for which the discount is related to
     * @param Collection Collection of books for which the discount is applicable for
     * @param Integer Discount percentage
     * @param String Discount description
     */
    public function createPercentedDiscountForInvoice(
        Invoice $invoice,
        Collection $books,
        int $percentage,
        string $description
    )
    {
        $em = $this->getEntityManager();
        $discount = new Discount;
        $discount->setName($description);
        $type = $percentage == 10 ? 1 : 2;
        $discount->setType($type);
        $discount->setInvoice($invoice);
        $discount->setPercentage($percentage);
        $discount->setAmount(0);
        $invoice->getDiscounts()->add($discount);
        $em->persist($invoice);
        $em->persist($discount);
        $em->flush();

        $this->refreshDiscountsForBooks($discount, $books);
    }

    /**
     * Removes the given discount from the given invoice
     * and saves the entity and association on the database (discount table are modified)
     * 
     * @param Invoice From which the given discount is removed
     * @param Discount Which is removed from given invoice
     */
    public function removeDiscountForInvoice(Invoice $invoice, Discount $discount)
    {
        $em = $this->getEntityManager();
        $invoice->getDiscounts()->removeElement($discount);
        $em->remove($discount);
        $em->persist($invoice);
        $em->flush();
    }

    /**
     * Removes all the discounts for a particular invoice
     */
    public function removeAllDiscountForInvoice(Invoice $invoice)
    {
        $em = $this->getEntityManager();
        foreach($invoice->getDiscounts() as $dis) {
            $em->remove($dis);
        }
        $invoice->getDiscounts()->clear();
        $em->persist($invoice);
        $em->flush();
    }

    /**
     * Recalculates the 10% discount for given books
     * and saves it to the database (discount table is modified)
     * 
     * @param Discount The discount entity in which the value should be recalculated
     * @param Collection The list of relavant books which are under the given discount entity
     */
    public function refreshDiscountsForBooks(Discount $discount, Collection $books)
    {
        $em = $this->getEntityManager();
        $discountAmount = 0;
        foreach($books as $b) {
            $discountAmount += $b->getPrice();
        }
        $discountAmount = $discountAmount * ($discount->getPercentage() / 100);
        $discount->setAmount($discountAmount);
        $em->persist($discount);
        $em->flush();
    }
}
