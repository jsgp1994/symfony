<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;

class ProductService
{

    private $productRepository;
    private $em;
    private $categoryService;

    public function __construct(ProductRepository $productRepository, EntityManagerInterface $em, CategoryService $categoryService) {
        $this->productRepository = $productRepository;
        $this->em = $em;
        $this->categoryService = $categoryService;
    }

    public function getAllProducts (): array
    {
        $products =  $this->productRepository->findAll();
        $data = [];

        foreach( $products as $product)
        {
            $data[] = [
                "name" => $product->getName()
            ];
        }

        return $data;

    }



    public function createProduct($name, $price)
    {
        $default = 1;

        $category = $this->categoryService->searchCategory($default);


        $product = new Product();
        $product
            ->setName($name)
            ->setPrice($price)
            ->setCategory($category);

        $this->em->persist($product);
        $this->em->flush();

        return $product;
    }

}