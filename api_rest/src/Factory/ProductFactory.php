<?php
namespace App\Factory;

use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Service\CategoryService;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Product>
 *
 * @method static Product|Proxy createOne(array $attributes = [])
 * @method static Product[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 */
final class ProductFactory extends ModelFactory
{
    private $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    protected function getDefaults(): array
    {

        $category_id = 1;
        $category = $this->categoryService->searchCategory($category_id);

        return [
            'name' => self::faker()->word(),     // Genera un nombre aleatorio
            'price' => self::faker()->randomFloat(2, 10, 1000),  // Precio aleatorio entre 10 y 1000,
            'category_id' => $category
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Product::class;
    }
}
