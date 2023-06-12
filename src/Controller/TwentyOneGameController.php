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

    }
