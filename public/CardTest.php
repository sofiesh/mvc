<?php

include(__DIR__ ."/../src/Card/Card.php");

        $colors = ['spades', 'hearts', 'clubs', 'diamonds'];
        for ($q = 0; $q < 4; $q++) {
            for ($i = 1; $i < 13; $i++) {
                $newCard = new Card();
                $newCard->setValue($i);
                $newCard->setColor($colors[$q]);
                $this->deck[] = $newCard->getCardAsText();
            }
        }

print_r($colors);


