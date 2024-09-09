<?php

namespace App\Service;

use App\Entity\Brand;
use App\Entity\Laptop;
use App\Repository\LaptopRepository;
use Doctrine\ORM\EntityManagerInterface;

class LapotService
{
    private $em;
    private $brandService;
    private $laptopRepository;

    public function __construct(EntityManagerInterface $em, BrandService $brandService, LaptopRepository $laptopRepository) {
        $this->em = $em;
        $this->brandService = $brandService;
        $this->laptopRepository = $laptopRepository;
    }

    public function createLaptop($name, $description, $price): Laptop
    {
        $laptop = new Laptop();
        $defaultBrand = 1;
        $brand = $this->brandService->searchBrand($defaultBrand);


        $laptop
            ->setName($name)
            ->setDescription($description)
            ->setPrice($price)
            ->setBrand($brand);

        $this->em->persist($laptop);
        $this->em->flush();

        return $laptop;

    }


    public function getAllLaptos(): array
    {
        $laptops = $this->laptopRepository->findAll();
        $data = [];

        foreach($laptops as $laptop)
        {
            $data[] = [
                "name" => $laptop->getName(),
                "description" => $laptop->getDescription(),
                "price" => $laptop->getPrice(),
                "brand" => $laptop->getBrand()->getName()
            ];
        }

        return $data;
    }


    public function updatedLaptop(int $id, string $name, string$description, float $price): Laptop
    {
        $laptop = $this->laptopRepository->find($id);

        $laptop
            ->setName($name)
            ->setDescription($description)
            ->setPrice($price);

        $this->em->persist($laptop);
        $this->em->flush();

        return $laptop;
    }

    public function deleteLaptop(int $id): void
    {
        $laptop = $this->laptopRepository->find($id);

        if ($laptop !== null) {
            $this->em->remove($laptop);
            $this->em->flush();
        }
    }

}