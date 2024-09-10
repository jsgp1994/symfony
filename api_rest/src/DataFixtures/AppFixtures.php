<?php

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

    //    // Usamos Faker para generar datos aleatorios
    //    $faker = Factory::create();

    //     // Crear 50 productos y asignarles una categoría aleatoria
    //     for ($i = 0; $i < 50; $i++) {
    //         $product = new Product();
    //         $product->setName($faker->word);
    //         $product->setPrice($faker->randomFloat(2, 10, 1000));
    //         $manager->persist($product);
    //     }

    //     $manager->flush();

    // ProductFactory::createMany(10);
        // CategoryFactory::createMany(10);
    }
}
