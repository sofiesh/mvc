<?php

/**
 * Show off the autoloader using namespace.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");


$object = new \Sofie\Person\Person("SuperSof", 36);
echo $object->details();
var_dump($object);