<?php

namespace App;

/**
 * Showing off a standard class with methods and properties.
 */
class Person1
{
    /**
    * @var string  $name   The name of the person.
    * @var integer $age    The age of the person.
    */
    public $name;
    public $age;

    /**
     * Print out details on the person.
     *
     * @return string with details on person
     */
    public function details()
    {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }
}

/*
$object = new Person1();
$object->age = 42;
$object->name = "MegaMic";

echo $object->details();
var_dump($object);
*/
