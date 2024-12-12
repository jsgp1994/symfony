<?php

use App\Dice;

class TwoHandedSwordType implements AttackType
{
    public function performAttack(int $baseDamage): int
    {
        $twoHandedSwordType = Dice::roll(12) + Dice::roll(12);
        return $baseDamage + $twoHandedSwordType;
    }
}

