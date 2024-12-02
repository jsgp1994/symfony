<?php

namespace App\Controller;

use App\Service\MessageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DecoratorController extends AbstractController
{
    private MessageServiceInterface $messageService;

    public function __construct(MessageServiceInterface $messageService) {
        $this->messageService = $messageService;
    }

    #[Route('/decorator', name: 'app_decorator')]
    public function index(): Response
    {

        $message = $this->messageService->getMessage('Pepe');

        return $this->render('decorator/index.html.twig', [
            'message' => $message,
        ]);
    }
}
