<?php

namespace App\Card;

use App\Card\Card;
use App\Card\CardDeck;

class CardHand // Heres my new class
{
    private $cards = []; // It has a value called cards and I've made that an array.
    // to access the array (cards) I have to write $this->cards.

    public function __construct()
    {
        $this->cards = array();
    }

    public function addCard($drawnCard)
    {
        $this->cards[] = $drawnCard;
    }

    public function getCards()
    {
        if ($this->cards !== null) {
            return $this->cards;
        } else {
            return "No cards yet";
        }
    }

    public function getHandValue()
    {
        $values = 0;

        foreach ($this->cards as $playerHand) {
            $values = $values + $playerHand->getValue();
        }

        return "" . $values;
    }


    public function getCardsAsStringArray()
    {
        $values = [];
        foreach ($this->cards as $playerHand) {
            $values[] = $playerHand->getCardAsText();
        }
        return $values;
    }



}
