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
     */
    public function createTenPercentDiscountForInvoice(Invoice $invoice, Collection $books)
    {
        $em = $this->getEntityManager();
        $discount = new Discount;
        $discount->setName('10% discount from the Children books total');
        $discount->setType(1);
        $discount->setInvoice($invoice);
        $discount->setPercentage(10);
        $invoice->getDiscounts()->add($discount);
        $discountAmount = 0;
        foreach($books as $b) {
            $discountAmount += $b->getPrice();
        }
        $discountAmount = $discountAmount * 0.10;
        $discount->setAmount($discountAmount);
        $em->persist($discount);
        $em->persist($invoice);
        $em->flush();
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
     * Recalculates the 10% discount for given books
     * and saves it to the database (discount table is modified)
     * 
     * @param Discount The discount entity in which the value should be recalculated
     * @param Collection The list of relavant books which are under the given discount entity
     */
    public function refreshTenPercentDiscountsForBooks(Discount $discount, Collection $books)
    {
        $em = $this->getEntityManager();
        $discountAmount = 0;
        foreach($books as $b) {
            $discountAmount += $b->getPrice();
        }
        $discountAmount = $discountAmount * 0.10;
        $discount->setAmount($discountAmount);
        $em->persist($discount);
        $em->flush();
    }
}
