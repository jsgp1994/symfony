<?php

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    private $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }


    /**
     * @Route("/api/products",methods={"GET"})
     */

    public function getAllProducts(): JsonResponse
    {
        $products = $this->productService->getAllProducts();
        return new JsonResponse($products, Response::HTTP_OK);
    }


    /**
     * @Route("/api/products", methods={"POST"})
     */

    public function createProduct(Request $request): JsonResponse
    {

        $data = json_decode($request->getContent(), true);


        $product = $this->productService->createProduct($data['name'], $data['price']);

        return $this->json([
            "message" => 'ok'
        ], Response::HTTP_OK);

    }

}
