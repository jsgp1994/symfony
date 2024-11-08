<?php

use App\Dice;

class BowType implements AttackType
{
    public function performAttack(int $baseDamage): int
    {
        $criticalChance = Dice::roll(10);
        return $criticalChance > 70 ? $baseDamage * 3 : $baseDamage;
    }
}