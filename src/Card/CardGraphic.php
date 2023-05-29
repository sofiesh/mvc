<?php

namespace App\Card;

class CardGraphic extends CardHand   //detta är min klass
{
    private $representation = [
        '♥',
        '♠',
        '♣',
        '♦',

    ];  // den här klassen har ett värde som heter representation.
    // här gör jag också deck till en array
    // om jag vill komma åt arrayen representation så skriver jag $this->representation,
    // för det är representation som hör till just den hand som är skapad.

    public function __construct()
    {
        $colors = ['spades', 'hearts', 'clubs', 'diamonds'];
        for ($q = 0; $q < 4; $q++) {
            for ($i = 1; $i < 14; $i++) {
                $newCard = new Card();
                $newCard->setValue($i);
                $newCard->setColor($colors[$q]);
                $this->deck[] = $newCard->getCardAsText();
            }
        }

    }

    public function getDeckAsArray()
    {
        return $this->deck;
    }

    public function getDeckAsShuffleArray()
    {
        shuffle($this->deck);
        return $this->deck;
    }

    public function countDeck()
    {
        $countDeck = count($this->deck);
        return $countDeck;
    }

    public function draw()
    {
        $drawnCard = array_rand($this->deck, 1);

        return $drawnCard;
    }

}
