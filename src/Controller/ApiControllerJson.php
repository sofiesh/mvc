<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardDeck;
use App\Card\CardHand;
use App\Card\CardGraphic2;

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

    #[Route("/api/deck", name: "deck")]
    public function jsonNumber(): Response
    {
        $deck = new CardDeck();

        $data = [
            "deck" => $deck->getDeckAsArray(),
        ];


        return new JsonResponse($data);
    }
}
