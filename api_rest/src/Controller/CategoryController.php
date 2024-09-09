<?php

namespace App\Controller;

use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{

    private $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }


    /**
     * @Route("/api/categories",methods = {"POST"})
     */

    public function createCategory(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->categoryService->createCategory($data['name']);

        return new JsonResponse([ "message" => "Create category successful" ],Response::HTTP_OK);

    }


    /**
     * @Route("/api/categories", methods={"GET"})
     */

    public function getAllCategories(): JsonResponse
    {
        $categories = $this->categoryService->getAllCategories();
        return new JsonResponse($categories, Response::HTTP_OK);
    }

}
