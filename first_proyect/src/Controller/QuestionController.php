<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
{

    /**
     * @Route("/")
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
        return new Response(sprintf('Pagina de preguntas individuales %s', $slug));
    }
}