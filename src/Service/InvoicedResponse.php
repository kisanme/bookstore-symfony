<?php

namespace App\Service;

use App\Repository\InvoiceRepository;

class InvoicedResponse
{
    public function __construct(InvoiceRepository $inv)
    {
        $this->inv = $inv;
    }

    public function initializeResponse()
    {
        return [
            'invoice' => $this->inv->activeInvoice()
        ];
    }
}