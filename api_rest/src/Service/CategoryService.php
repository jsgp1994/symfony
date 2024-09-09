<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;

class CategoryService
{

    private $categoryRepository;
    private $em;

    public function __construct(CategoryRepository $categoryRepository, EntityManagerInterface $em) {
        $this->categoryRepository = $categoryRepository;
        $this->em = $em;
    }

    public function searchCategory($category_id): Category
    {
        return $this->categoryRepository->findOneBy(['id' => $category_id]);
    }

    public function createCategory($name): Category
    {

        $category = new Category();
        $category
            ->setName($name);

        $this->em->persist($category);
        $this->em->flush();
        return $category;

    }

    public function getAllCategories(): array
    {
        $categories = $this->categoryRepository->findAll();
        $data = [];

        foreach($categories as $category)
        {
            $data[] = [
                "name" => $category->getName()
            ];
        }

        return $data;
    }

}