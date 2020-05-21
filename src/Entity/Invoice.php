<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvoiceRepository::class)
 */
class Invoice
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $invoice_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payment_status;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $payment_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coupon_code;

    /**
     * @ORM\Column(type="integer")
     */
    private $total_payable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discount_amount;

    /**
     * @ORM\ManyToMany(targetEntity=Book::class, inversedBy="invoices")
     */
    private $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoice_date;
    }

    public function setInvoiceDate(\DateTimeInterface $invoice_date): self
    {
        $this->invoice_date = $invoice_date;

        return $this;
    }

    public function getPaymentStatus(): ?bool
    {
        return $this->payment_status;
    }

    public function setPaymentStatus(bool $payment_status): self
    {
        $this->payment_status = $payment_status;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->payment_date;
    }

    public function setPaymentDate(?\DateTimeInterface $payment_date): self
    {
        $this->payment_date = $payment_date;

        return $this;
    }

    public function getCouponCode(): ?string
    {
        return $this->coupon_code;
    }

    public function setCouponCode(?string $coupon_code): self
    {
        $this->coupon_code = $coupon_code;

        return $this;
    }

    public function getTotalPayable(): ?int
    {
        return $this->total_payable;
    }

    public function setTotalPayable(int $total_payable): self
    {
        $this->total_payable = $total_payable;

        return $this;
    }

    public function getDiscountAmount(): ?int
    {
        return $this->discount_amount;
    }

    public function setDiscountAmount(?int $discount_amount): self
    {
        $this->discount_amount = $discount_amount;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
        }

        return $this;
    }
}
