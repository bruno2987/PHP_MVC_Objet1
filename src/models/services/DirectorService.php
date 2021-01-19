<?php
namespace PHP_MVC_Objet1\models\Services;

use PHP_MVC_Objet1\models\DAOs\DirectorDao;
use PHP_MVC_Objet1\models\entities\Director;

class DirectorService {
    private $directorDao;

    public function __construct() {
        $this->directorDao = new DirectorDao();
    }

    public function getAllDirectors() {
        $directors = $this ->directorDao->findAll();
        return $directors;
    }
}

?>