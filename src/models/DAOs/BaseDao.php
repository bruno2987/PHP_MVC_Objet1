<?php

namespace PHP_MVC_Objet1\models\DAOs;

use PDO;

// Ce fichier établie la connexion avec le base de donnée sur laquelle on travail

class BaseDao {
    protected $db;
    public function __construct() {
        $this->db = new PDO ('mysql:host=localhost;dbname=php_mvc_objet1','root','');
    }
}

?>