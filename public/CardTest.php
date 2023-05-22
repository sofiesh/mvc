<?php

    $cards = array(
        "Hearts", "Spades", "Dimes", "Clubs");
    $pickCard = $cards[array_rand($cards, 1)];

    var_dump($pickCard);


    
?>
