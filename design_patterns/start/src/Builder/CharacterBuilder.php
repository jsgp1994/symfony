<?php

namespace App\Builder;

use App\ArmorType\ArmorType;
use App\ArmorType\IceBlockType;
use App\ArmorType\LeatherArmorType;
use App\ArmorType\ShieldType;
use App\Character\Character;
use AttackType;
use BowType;
use FireBolType;
use MultiAtackType;
use Psr\Log\LoggerInterface;
use TwoHandedSwordType;

class CharacterBuilder
{

    private int $maxHealth;
    private int $baseDamage;
    private string $armorType;
    private array $attackTypes;


    public function __construct(private LoggerInterface $logger) {

    }

    public function buildCharacter(): Character
    {
        $this->logger->info('Building character', [
            'maxHealth' => $this->maxHealth,
            'baseDamage' => $this->baseDamage,]);
        $attackTypes = array_map(fn(string $attackType) => $this->createAttackType($attackType), $this->attackTypes);

        if (count($attackTypes) === 1) {
            $attackType = $attackTypes[0];
        } else {
            $attackType = new MultiAtackType($attackTypes);
        }

        return new Character(
            $this->maxHealth,
            $this->baseDamage,
            $this->createArmorType(),
            $attackType
        );
    }

    public function setMaxHealth(int $maxHealth): self
    {
        $this->maxHealth = $maxHealth;
        return $this;
    }

    public function setBaseDamage(int $baseDamage): self
    {
        $this->baseDamage = $baseDamage;
        return $this;
    }

    public function setArmorType(string $armorType): self
    {
        $this->armorType = $armorType;
        return $this;
    }
    public function setAttackType(string ...$attackTypes): self
    {
        $this->attackTypes = $attackTypes;
        return $this;
    }

    private function createAttackType(string $attackType): AttackType
    {
        return match ($attackType) {
            'bow' => new BowType(),
            'fire_bolt' => new FireBolType(),
            'sword' => new TwoHandedSwordType(),
            default => throw new \RuntimeException('Undefined AttackType'),
        };
    }

    public function createArmorType(): ArmorType
    {
        return match ($this->armorType) {
            'ice_block' => new IceBlockType(),
            'leather' => new LeatherArmorType(),
            'shield' => new ShieldType(),
            default => throw new \RuntimeException('Undefined ArmorType'),
        };
    }

}
