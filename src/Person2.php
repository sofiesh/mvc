<?php

namespace App;

/**
 * Showing off a standard class with methods and properties.
 */
class Person2
{
    private $name;
    private $age;

    public function details()
    {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }
}

/**
$object = new Person2();
// $object->age = 42;
// $object->name = "MegaMic";

echo $object->details();
var_dump($object);
 */
