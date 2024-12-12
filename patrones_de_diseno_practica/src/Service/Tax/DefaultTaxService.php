<?php

namespace App\Service\Tax;

use App\Interface\TaxInterface;

class DefaultTaxService implements TaxInterface
{
    public function calculateTax(float $amount): float
    {
        return 0;
    }

}
