<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Dinosaur;
use App\Enum\HealthStatus;
use PHPUnit\Framework\TestCase;

class DinosaurTest extends TestCase
{

    public function testGetAndSetData(): void
    {
        $dino = new Dinosaur(
            name: 'test',
            genus: 'Tiranosaurio',
            length: 15,
            enclosure: 'Passillo 1'
        );

        self::assertSame('test', $dino->getName());
        self::assertSame('Tiranosaurio', $dino->getGenus());
        self::assertSame(15, $dino->getLength());
        self::assertSame('Passillo 1', $dino->getEnclosure());
    }

    /**
     * @dataProvider setDescriptionPRovider
     */

    public function testGestSizeDescriptionLarge(int $length, string $expectedSize): void
    {
        $dino = new Dinosaur( name: 'Big Dinosaur', length: $length);

        self::assertSame($expectedSize, $dino->getSizeDescription());
    }

    public function setDescriptionPRovider()
    {
        yield '10 Meters large Dino' => [10, 'Large'];
        yield '5 Meters large Dino' => [5, 'Medium'];
        yield '4 Meters large Dino' => [4, 'Small'];
    }

    public function testVisitorDinos(): void
    {
        $dino = new Dinosaur('Dinosaur');
        $this->assertTrue($dino->availableForVisits());
    }


    public function testNotVisitDinos(): void
    {
        $dino = new Dinosaur('Dinosaur');
        $dino->setHelthStatus(HealthStatus::SICK);
        $this->assertSame(false, $dino->availableForVisits());
    }

}
