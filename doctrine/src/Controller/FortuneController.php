<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\FortuneCookieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FortuneController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(Request $request, CategoryRepository $categoryRepository): Response
    {
        $valueSearch = $request->query->get('q');

        $categories = $valueSearch ? $categoryRepository->search($valueSearch) : $categoryRepository->findAllOrder();

        return $this->render('fortune/homepage.html.twig',[
            'categories' => $categories
        ]);
    }

    #[Route('/category/{id}', name: 'app_category_show')]
    public function showCategory(int $id, CategoryRepository $categoryRepository, FortuneCookieRepository $fortuneCookieRepository): Response
    {
        $category = $categoryRepository->findWithFortuneJoins($id);

        if(!$category)
        {
            throw $this->createNotFoundException('Category not found');
        }

        $categoryFortuneStats = $fortuneCookieRepository->getNumberPrineter($category);


        return $this->render('fortune/showCategory.html.twig',[
            'category' => $category,
            'numberPrinter' => $categoryFortuneStats->fortunesPrinted,
            'averagePrinted' => $categoryFortuneStats->fortunesAverage
        ]);
    }
}
