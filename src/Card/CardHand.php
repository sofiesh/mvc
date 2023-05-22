<?php

namespace App\Card;

use App\Card\Card;
use App\Card\CardDeck;

class CardHand // Heres my new class
{
    private $hand = []; // It has a value called hand and I've made that an array.
    // to access the array (hand) I have to write $this->hand.


    // draw a random card from the CardDeck
    public function drawCard(CardDeck $deck)
    {
        $count = array_rand(1, count($this->deck));
        $hand = $this->deck[$count]->getValue();
        unset($this->deck[$count]);

        return $hand;
    }


    // count the number of cards that are left when you have drawn one card
    public function getRemainingCards()
    {
        return count($this->deck);
    }

    /**
    public function add(Card $card): void
    {
        $this->hand[] = $card;
    }

    public function draw(CardHand $deck): void
    {
        foreach ($this->deck as $card) {
            $card->draw();
        }
    }

    public function getNumberCards(): int
    {
        return count($this->deck);
    }

    public function getValues(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getValue();
        }
        return $values;
    }

    public function getString(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getAsString();
        }
        return $values;
    }

     */
}
