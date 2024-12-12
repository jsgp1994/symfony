<?php
namespace App\Factory;

use App\Entity\Category;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Category>
 *
 * @method static Category|Proxy createOne(array $attributes = [])
 * @method static Category[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 */
final class CategoryFactory extends ModelFactory
{

    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->word(),     // Genera un nombre aleatorio
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Category::class;
    }
}
