<?php
namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class ProductoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = $this->getReference(CategoriaFixtures::CATEGORY_REFERENCE);
        $faker = Factory::create();

        for ($i=0; $i < 20; $i++) {

            $product = new Product();
            $product
                ->setName($faker->name())
                ->setPrice($faker->randomFloat(2, 10, 1000))
                ->setCategory($category);

            $manager->persist($product);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoriaFixtures::class,
        ];
    }
}
