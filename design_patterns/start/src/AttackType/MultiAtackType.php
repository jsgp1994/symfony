<?php

class MultiAtackType implements AttackType
{

    public function __construct(private array $attacksType) {

    }

    public function performAttack(int $baseDamage): int
    {
        $type = $this->attacksType[array_rand($this->attacksType)];

        return $type->performAttack($baseDamage);
    }
}
