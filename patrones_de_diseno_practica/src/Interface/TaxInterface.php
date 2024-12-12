<?php

namespace App\Interface;

interface TaxInterface
{
    public function calculateTax(float $amount): float;
}
