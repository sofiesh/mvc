<?php

namespace App\Card;

class CardGraphic2 extends Card
{
    private $value;
    private $color;
    private $representation = [
        '♥',
        '♠',
        '♣',
        '♦',
    ];

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
        return $this->representation[$this->color - 1];
    }

    public function getColor()
    {
        return $this->representation[$this->color - 1];
    }

    public function getCardAsText()
    {
        $text = $this->color . $this->value;
        return $text;
    }

    public function drawCard()
    {
        $this->color = random_int(1, 4);
        $this->value = random_int(1, 13);
        // $drawncard = $this->color . $this->value;
        $text = $this->color . $this->value;
        return $text;
    }
}
