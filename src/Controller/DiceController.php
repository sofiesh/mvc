<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DiceController
{
    #[Route("/dice", name: "dice")]
    public function diceview(): Response
    {

        return $this->render('dice.html.twig', $data);

    }
}
