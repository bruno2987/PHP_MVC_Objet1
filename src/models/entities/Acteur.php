<?php

namespace PHP_MVC_Objet1\models\entities;

class Acteur {

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
    *@return Acteur;
    */

    public function setId(int $id): Acteur {
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
    *@return Acteur;
    */

    public function setLastName(string $name): Acteur {
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
    *@return Acteur;
    */

    public function setfirstName(string $firstname): Acteur {
        $this->firstName = $firstname;
        return $this;
    }
}



?>