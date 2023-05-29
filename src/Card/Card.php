<?php

namespace App\Card;

class Card
{
    private $value;
    private $color;

    public function setValue(int $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getCardAsText()
    {
        $text = $this->color . $this->value;
        return $text;
    }

    /** Try to draw a card placed in Card class
    public function drawCard()
    {
        $this->color = random_int(1, 4);
        $this->value = random_int(1, 13);
        // $drawncard = $this->color . $this->value;
        $text = $this->color . $this->value;
        return $text;
    } */
}
