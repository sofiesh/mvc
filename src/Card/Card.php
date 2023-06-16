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

    public function getACard() 
    {
        return $this->value . $this->color;
    }
}
