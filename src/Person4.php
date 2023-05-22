<?php

namespace App;

/**
 * Showing off a standard class with methods and properties.
 */
class Person4
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



    /**
     * Constructor to create a Person.
     *
     * @param string $name The name of the person.
     * @param int    $age  The age of the person.
     */
    public function __construct(string $name = null, int $age = null)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * Destroy a Person.
     */
    public function __destruct()
    {
        echo __METHOD__;
    }
}

/** 
// När vi vet namn och ålder:
$object = new Person4("MegaMic", 42);
echo $object->details();
var_dump($object);

// När vi vet namn: $object = new Person4("MegaMic");
$object = new Person4("MegaMic");
echo $object->details();
var_dump($object);

// När vi inte har varken namn eller ålder: $object = new Person4();
$object = new Person4();
echo $object->details();
var_dump($object);
*/
