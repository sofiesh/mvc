<?php

namespace Sofie\Dice;

    include(__DIR__ . "/config.php");
    // include(__DIR__ . "/autoload_namespace.php");
    include(__DIR__ ."/../src/Dice/Dice.php");

// Rolling the dice
    $object = new Dice();
    echo "<h1>Rolling dice 6 times</h1>";
    $numbers = array();
    echo "<ol>";
    for ($i = 0; $i <=5; $i++) {
        echo "<li>" . $numbers[]=$object->dicethrow() . "</li>";
    }
    echo "</ol>";

    echo print_r($numbers) . "<br>";

// calculating the sum
echo "Sum is: " . array_sum ($numbers) . "." . "<br>";

// calculating the average
$average = array_sum($numbers) / count($numbers);
echo "Average is: " . $average . ".";
// echo "Average is: " . array_sum ($numbers) . ".";


