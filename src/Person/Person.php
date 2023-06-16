<?php

namespace App\Person;

use App\Person\PersonAgeException;

/**
 * Showing off a standard class with methods and properties.
 */
class Person
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
        if (!(is_int($age) && $age >= 0)) {
            throw new PersonAgeException("Age is only allowed to be a positive integer.");
        }
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
        // echo __METHOD__;
    }
}

$person = new Person();
