<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiControllerJson extends AbstractController
{
    #[Route("/api", name: "api")]
    public function home(): Response
    {
        return $this->render('jsonapi.html.twig');
    }

    #[Route("/api/quote", name: "quote")]
    public function jsonQuote(): Response
    {
        $todaysquote = random_int(0, 2);

        $quoteList = array(
            0 => "Carpe Diem",
            1 => "Live your dream",
            2 => "Send it"
        );

        $data = [
            'quote' => $quoteList[$todaysquote],
            'generated' => date("D M j G:i:s T Y")
        ];

        return new JsonResponse($data);

    }
}
