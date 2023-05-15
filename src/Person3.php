<?php

namespace App;

/**
 * Showing off a standard class with methods and properties.
 */
class Person3
{
    private $name;
    private $age;

    /**
     * Set the age of the person
     *
     * @param int $age The age of the person
     *
     * @return void
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    /**
     * Get the age of the person
     *
     * @return int as the age of the person
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the name of the person
     *
     * @param int $name The name of the person
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the name of the person
     *
     * @return str as the name of the person
     */
    public function getName()
    {
        return $this->name;
    }

    public function details()
    {
        return "My name is {$this->name} and I am {$this->age} years old.";
    }
}

$object = new Person3();
$object->setAge(42);
$object->setName("MegaMic");

echo $object->details();
var_dump($object);
