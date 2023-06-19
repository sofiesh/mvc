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

// use Symfony\Component\HttpFoundation\JsonResponse;

class TwentyOneGameController extends AbstractController
{
    #[Route("/game", name: "game_21")]
    public function home(): Response
    {
        return $this->render('game/home.html.twig');
    }

    #[Route("/game/doc", name: "doc_game_21")]
    public function doc(): Response
    {
        return $this->render('game/doc.html.twig');
    }

    // Initialize a new game by clearing the session
    #[Route("/game/new_game", name: "new_game", methods: ['GET'])]
    public function newGame(
        SessionInterface $session
    ): Response {

        // start a new session for this game
        session_start();
        // destroy the previous game
        session_destroy();
        // start a new session for this game
        session_start();

        //Start new shuffled deck and store in session
        $thisRoundDeck = new CardDeck();
        $session->set("deck", $thisRoundDeck);

        return $this->redirectToRoute('playing_player');
    }


    #[Route("/game/playing_player", name: "playing_player")]
    public function playing_player(
        SessionInterface $session
    ): Response {
        //Start new shuffled deck and store in session
        // $thisRoundDeck = new CardDeck();
        $thisRoundDeck = $session->get("deck");

        // $playerHand = $session->get("playerHand");

        if ($session->has('playerHand')) {
            $playerHand = $session->get('playerHand');
        } else {
            $playerHand = new CardHand();
        }

        $bankHand = $session->get("bankHand");

        // Error message if player got 21.
        $playerTotal = $playerHand->getHandValue();
        $message = '';

        if ($playerTotal > 21) {
            $message = "You got over 21 and lost to the bank. Start a new game!";
        } else {
            $message = "Your current score is:" . $playerTotal;
        }

        $data = [
            // Show the deck
            // "deck" => $thisRoundDeck->getDeckAsShuffleArray(),
            // Count deck
            "countDeck" => $thisRoundDeck->countDeck(),
            // Show playerHand
            "playerHand" => $playerHand->getCardsAsStringArray(),
            // Show playerTotal
            "playerTotal" => $playerHand->getHandValue(),
            // Message if lost
            "message" => $message,
        ];

        $session->set("playerTotal", $playerHand->getHandValue());

        return $this->render('game/playing_player.html.twig', $data);
    }

    // Player draws cards
    #[Route("/game/player_draw", name: "draw_player", methods: ['GET'])]
    public function drawPlayer(
        SessionInterface $session
    ): Response {
        // Get the deck from the session
        $thisRoundDeck = $session->get("deck");

        // Check if there is an existing CardHand in the session
        // if there is add card to that, if not create a new CardHand.
        if ($session->has('playerHand')) {
            $playerHand = $session->get('playerHand');
        } else {
            $playerHand = new CardHand();
        }

        // draw card and add them to $playerHand
        $playerHand->addCard($thisRoundDeck->draw());

        $data = [
            // Shows the hand of the player
            // "playerHand" => $playerHand->getCards(),
        ];

        $session->set("playerHand", $playerHand);

        return $this->redirectToRoute('playing_player');
    }


    // Table for bank
    #[Route("/game/playing_bank", name: "playing_bank")]
    public function playing_bank(
        SessionInterface $session
    ): Response {
        // Get the deck and hands from the session
        $thisRoundDeck = $session->get("deck");
        $playerHand = $session->get("playerHand");

        if ($session->has('bankHand')) {
            $bankHand = $session->get('bankHand');
        } else {
            $bankHand = new CardHand();
        }

        // Error message if player got 21.
        $bankTotal = $bankHand->getHandValue();
        $message = '';

        if ($bankTotal > 21) {
            $message = "Your score is " . $bankTotal . ", which means you got over 21 and lost to the player. Start a new game!";
        } elseif ($bankTotal == 21) {
            $message = "Congrats, you hit" . $bankTotal . " and won!";
        } else {
            $message = "Your current score is:" . $bankTotal;
        }

        $data = [
            // This shows the deck
            // "deck" => $thisRoundDeck->getDeckAsShuffleArray(),
            // Count deck
            "countDeck" => $thisRoundDeck->countDeck(),
            // Show bankHand
            "bankHand" => $bankHand->getCardsAsStringArray(),
            // Show bankTotal
            "bankTotal" => $bankHand->getHandValue(),
            // Message if lost
            "message" => $message,
        ];

        $session->set("bankTotal", $bankHand->getHandValue());

        return $this->render('game/playing_bank.html.twig', $data);
    }

    // Bank draws cards
    #[Route("/game/bank_draw", name: "draw_bank", methods: ['GET'])]
    public function drawBank(
        SessionInterface $session
    ): Response {
        // Get the deck from the session
        $thisRoundDeck = $session->get("deck");

        // Check if there is an existing CardHand in the session
        // if there is add card to that, if not create a new CardHand.
        if ($session->has('bankHand')) {
            $bankHand = $session->get('bankHand');
        } else {
            $bankHand = new CardHand();
        }

        // draw card and add them to $playerHand
        $bankHand->addCard($thisRoundDeck->draw());

        $data = [
            // Shows the hand of the bank
            "bankHand" => $bankHand,
        ];

        $session->set("bankHand", $bankHand);

        return $this->redirectToRoute('playing_bank');
    }

    // Route for STAY - compare scores
    #[Route("/game/bank_stay", name: "bank_stay", methods: ['GET'])]
    public function stayBank(
        SessionInterface $session
    ): Response {
        // Get deck and scores from the session
        $thisRoundDeck = $session->get("deck");
        $playerTotal = $session->get("playerTotal");
        $bankTotal = $session->get("bankTotal");

        if ($bankTotal == 21) {
            $winnerMessage = "BANK!";
        } elseif ($bankTotal > $playerTotal) {
            $winnerMessage = "BANK!";
        } else {
            $winnerMessage = "PLAYER!";
        }

        $data = [
            // show bankHand
            // "bankHand" => $bankHand,
            // show scores
            "playerTotal" => $playerTotal,
            "bankTotal" => $bankTotal,
            "winnerMessage" => $winnerMessage,
        ];

        return $this->render('game/playing_winner.html.twig', $data);

    }

}
