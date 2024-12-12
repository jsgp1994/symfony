<?php
namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CourseFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i=0; $i < 20; $i++) {
            $course = new Course();
            $course->setName($faker->name());
            $course->setState(true);
            $manager->persist($course);
        }
        $manager->flush();
    }
}
