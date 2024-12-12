<?php

namespace App\Controller;

use App\Service\LapotService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LaptopController extends AbstractController
{
    private $lapotService;

    public function __construct(LapotService $lapotService)
    {
        $this->lapotService = $lapotService;
    }

    /**
     * @Route("/api/laptops", methods={"POST"})
     */

    public function createLaptop(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $lapot = $this->lapotService->createLaptop($data['name'], $data['description'], $data['price']);
        return new JsonResponse(["message" => "Laptp create successfull"], Response::HTTP_OK);

    }

    /**
     * @Route("/api/laptops",methods={"GET"})
     */

    public function getAllLaptos(): JsonResponse
    {

        $lapots = $this->lapotService->getAllLaptos();
        return new JsonResponse($lapots, Response::HTTP_OK);
    }

    /**
     * @Route("/api/laptops",methods={"PUT"})
     */

    public function updatedLaptop(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $this->lapotService->updatedLaptop($data['id'], $data['name'], $data['description'], $data['price']);
        return new JsonResponse(["message" => "Updated Successfull"], Response::HTTP_OK);
    }

    /**
     * @Route("/api/laptops/{id}", methods={"DELETE"})
     */

    public function deleteLaptop($id): JsonResponse
    {
        $this->lapotService->deleteLaptop($id);
        return new JsonResponse(["message" => "Product Delete Succesfull"], Response::HTTP_OK);
    }


}
