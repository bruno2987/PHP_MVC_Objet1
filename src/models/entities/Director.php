<?php

namespace PHP_MVC_Objet1\models\entities;

class Director {

    private $id;
    private $lastName;
    private $firstName;

    /**
    *@return int;
    */

    public function getId(): int {
        return $this->id;
    }

    /**
    *@param int $id
    *@return Director;
    */

    public function setId(int $id): Director {
        $this->id = $id;
        return $this;
    }

        /**
    *@return string;
    */

    public function getlastName(): string {
        return $this->lastName;
    }

    /**
    *@param string $name;
    *@return Director;
    */

    public function setLastName(string $name): Director {
        $this->lastName = $name;
        return $this;
    }

            /**
    *@return string;
    */

    public function getfirstName(): string {
        return $this->firstName;
    }

    /**
    *@param string $name;
    *@return Director;
    */

    public function setfirstName(string $firstname): Director {
        $this->firstName = $firstname;
        return $this;
    }
}



?>