<?php


/**
 * Autoloader
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/../src/autoload.php");

$person = new Person5("MegaMic");
$person->setAge(-42);

try {
    $person = new Person5("MegaMic");
    $person->setAge(-42);
} catch (PersonAgeException $e) {
    echo "Got exception: " . get_class($e) . "<hr>";
} 

$person = new Person5("MegaMic", -42);

echo $person->details();
var_dump($person);