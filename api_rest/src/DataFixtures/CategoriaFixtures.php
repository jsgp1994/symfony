<?php
namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoriaFixtures extends Fixture
{
    public const CATEGORY_REFERENCE = 'categoria-ref';

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $category = null;

        for ($i=0; $i < 20; $i++) {
            $category = new Category();
            $category->setName($faker->word);
            $manager->persist($category);
        }


        // Guardamos las categorías para que puedan ser usadas en otros fixtures
        $this->addReference(self::CATEGORY_REFERENCE, $category);

        $manager->flush();
    }
}
