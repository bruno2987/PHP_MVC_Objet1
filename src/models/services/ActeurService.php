<?php
namespace PHP_MVC_Objet1\models\Services;

use PHP_MVC_Objet1\models\DAOs\ActeurDao;
use PHP_MVC_Objet1\models\entities\Acteur;

class ActeurService {
    private $acteurDao;

    public function __construct() {
        $this->acteurDao = new ActeurDao();
    }

    public function getAllActors() {
        $acteurs = $this ->acteurDao->findAll();
        return $acteurs;
    }
}

?>