<?php

namespace App\Service\Tax;

use App\Interface\TaxInterface;

class TaxColombiaService implements TaxInterface
{

    public function calculateTax(float $amount): float
    {
        return $amount * 0.19;
    }

}
