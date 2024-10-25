<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TemplateController extends AbstractController
{
    #[Route('/template/{id}', name: 'app_template')]
    public function index(int $id): Response
    {
        return $this->render('template/index.html.twig', [
            'id' => $id,
        ]);
    }

    #[Route('/excepcion', name: 'app_template_excepcion')]
    public function excepcion(): Response
    {
        //404
        throw $this->createNotFoundException("testing");
        //throw new Exception("testing"); 404
    }
}
