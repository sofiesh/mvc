<?php
/**
 * Show off the autoloader
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/../src/autoload.php");

$object = new Person4("MegaMic", 42);
echo $object->details();
var_dump($object);
