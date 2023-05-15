<?php

namespace Sofie\Dice;

include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");


$hand = new DiceHand(5);

$hand->roll();
echo $hand->getHand();

echo print_r($hand);
// echo print_r($hand->getHand());
// echo print_r($hand->values());


?><h1>Rolling a dicehand with five dice</h1>







