<?php

use App\Dice;

class FireBolType implements AttackType
{
    public function performAttack(int $baseDamage): int
    {
        return Dice::roll(10) + Dice::roll(10) + Dice::roll(10);
    }
}
