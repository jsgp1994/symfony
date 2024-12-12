<?php

namespace App\Service\Tax;

use App\Interface\TaxInterface;

class TaxContextService
{
    private TaxInterface $taxCountry;

    public function setTax(TaxInterface $taxCountry): void
    {
        $this->taxCountry = $taxCountry;
    }

    public function getTax(float $amount): float
    {
        return $this->taxCountry->calculateTax($amount);
    }

}
