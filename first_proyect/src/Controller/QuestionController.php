<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{

    /**
     * @Route("/",name="app_home")
     */
    public function homepage()
    {
        return new Response("Esto es una prueba");
    }

    /**
     * @Route("/questions/{slug}")
     */

    public function show($slug)
    {
        $answers = [
            'A. Respuesta X 😊',
            'B. Respuesta y',
            'C. Respuesta z',
        ];

        return $this->render('question/show.html.twig', [
            'question' => $slug,
            'answers' => $answers
        ]);
    }
}