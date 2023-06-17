<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardDeck;
use App\Card\CardHand;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CardGameController extends AbstractController
{
    #[Route("/card", name: "card_game")]
    public function home(): Response
    {
        return $this->render('card/home.html.twig');
    }

    #[Route("/card/deck", name: "deck")]
    public function number(): Response
    {
        $deck = new CardDeck();

        $data = [
            "deck" => $deck->getDeckAsArray(),
        ];


        return $this->render('card/deck.html.twig', $data);
    }

    #[Route("/card/deck/shuffle", name: "deck_shuffle")]
    public function shuffle(
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

        return $this->render('card/deck_shuffle.html.twig', $data);
    }

    #[Route("/card/deck/draw", name: "deck_draw")]
    public function drawCard(
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

        return $this->render('card/deck_draw.html.twig', $data);
    }

    #[Route("/card/deck/draw/{num<\d+>}", name: "draw_number")]
    public function drawNumber(
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
            "deck" => $thisRoundDeck->getDeckAsShuffleArray(),
            "handOfCards" => $handOfCards,
            "countDeck" => $thisRoundDeck->countDeck(),
        ];

        return $this->render('card/deck_draw_number.html.twig', $data);
    }
}
