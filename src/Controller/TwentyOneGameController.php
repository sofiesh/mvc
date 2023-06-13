<?php

namespace App\Controller;

use App\Card\Card;
use App\Card\CardDeck;
use App\Card\CardHand;
use App\Card\CardGraphic2;


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

        #[Route("/game/playing_player", name: "playing_player")]
        public function playing_player(
            SessionInterface $session
        ): Response
        {
            // Destroy session
            $_SESSION = [];

            //Start new shuffled deck and store in session
            $shuffleDeck = new CardDeck();
            $session->set("deck", $shuffleDeck);
    
            $data = [
                "deck" => $shuffleDeck->getDeckAsShuffleArray(),
            ];
            
            // Assign drawn card to hand ???


            return $this->render('game/playing_player.html.twig');
        }

        #[Route("/game/playing_bank", name: "playing_bank")]
        public function playing_bank(): Response
        {
            return $this->render('game/playing_bank.html.twig');
        }

    }
