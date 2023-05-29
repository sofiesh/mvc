<?php

namespace App\Card;

class CardDeck   //detta är min klass
{
    private $deck = [];  // den här klassen har ett värde som heter deck.
    // här gör jag också deck till en array
    // om jag vill komma åt arrayen deck så skriver jag $this->deck, för det är deck
    // som hör till just den decken som är skapad.

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
        $drawCard = array_rand($this->deck[], 1);

        return $drawCard;
    }

}

echo $drawCard;
