<?php

class Card implements JsonSerializable
{
    private $suit;
    private $value;

    public function __construct($suit, $number) {
        if (!is_string($suit)) {
            throw new InvalidArgumentException(
                'First parameter to Card::__construct() must be a string.'
            );
        }

        if (!is_string($number) && !filter_var($number, FILTER_VALIDATE_INT)) {
            throw new InvalidArgumentException(
                'Second parameter to Card::__construct() must be a string or an int.'
            );
        }
        $this->suit = $suit;
        $this->number = $number;
    }

    // The suit for the card
    public function suit() {
        return $this->suit;
    }

    // The value of the card
    public function value() {
        return $this->value;
    }

    // Return a string that shows the whole card
    public function __toString() {
        return json_encode($this->jsonSerialize());
    }
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}

class Deck
{
    private $deck;

    // Creates ordered deck
    public function __construct(array $deck=null) {
        if (isset($deck) && count($deck) > 0) {
            foreach ($deck as $card) {
                if (!($card instanceof Card)) {
                    throw new InvalidArgumentException(
                        'The first parameter to Deck::__construct must be an array'
                            . ' containing only objects of type Card'
                    );
                }
            }
            $this->deck = $deck;
        } else {
            $this->deck = $this->createDeck();
        }
    }
}
    

