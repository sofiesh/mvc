<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardDeck;
use App\Card\CardHand;
// use App\Card\CardGraphic2;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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

    #[Route("/api/deck", name: "api_deck_get", methods: ['GET'])]
    public function jsonDeck(): Response
    {
        $deck = new CardDeck();

        $data = [
            "deck" => $deck->getDeckAsArray(),
        ];

        return new JsonResponse($data);
    }

    #[Route("/api/deck/shuffle", name: "api_shuffle_post", methods: ['POST'])]
    public function jsonShuffle(
        SessionInterface $session
    ): Response {
        // Destroy session
        $_SESSION = [];

        //Start new deck and store in session
        $shuffleDeck = new CardDeck();
        $session->set("deck", $shuffleDeck);

        $data = [
            "deck" => $shuffleDeck->getDeckAsShuffleArray(),
        ];

        return new JsonResponse($data);
    }

    #[Route("/card/deck/draw", name: "api_deck_draw")]
    public function jsonDrawCard(
        SessionInterface $session
    ): Response {
        $thisRoundDeck = $session->get("deck");

        $data = [
        // Draws a card from thisRoundDeck
        "draw" => $thisRoundDeck->draw(),
        // Count deck
        "countDeck" => $thisRoundDeck->countDeck(),
        // This shows remaining deck
        "deck" => $thisRoundDeck->getDeckAsShuffleArray(),
        ];

        return new JsonResponse($data);
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "api_draw_number")]
    public function jsonDrawNumber(
        int $num,
        SessionInterface $session
    ): Response {
        $thisRoundDeck = $session->get("deck");

        if ($num > $thisRoundDeck->countDeck()) {
            throw new \Exception("You're out of cards pal!");
        }

        $handOfCards = [];
        for ($i = 1; $i <= $num; $i++) {
            // $thisRoundDeck->draw();
            $handOfCards[] = $thisRoundDeck->draw();
        }

        $data = [
            "handOfCards" => $handOfCards,
            "countDeck" => $thisRoundDeck->countDeck(),
            "deck" => $thisRoundDeck->getDeckAsShuffleArray(),
        ];

        return new jsonResponse($data);
    }
}
