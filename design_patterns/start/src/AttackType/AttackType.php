<?php

interface AttackType
{
    public function performAttack(int $baseDamage): int;
}
