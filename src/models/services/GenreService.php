<?php
namespace PHP_MVC_Objet1\models\Services;

use PHP_MVC_Objet1\models\DAOs\GenreDao;
use PHP_MVC_Objet1\models\entities\genre;

class GenreService {
    private $genreDao;

    public function __construct() {
        $this->genreDao = new GenreDao();
    }

    public function getAllGenres() {
        $genres = $this ->genreDao->findAll();
        return $genres;
    }

}