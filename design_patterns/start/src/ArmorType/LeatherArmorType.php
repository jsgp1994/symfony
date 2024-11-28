<?php

namespace App\ArmorType;

class LeatherArmorType implements ArmorType
{
    public function getArmorReduction( int $damage): int
    {
        /**
         * above 50% armor reduction
         */
        return floor($damage * 0.25);
    }
}
