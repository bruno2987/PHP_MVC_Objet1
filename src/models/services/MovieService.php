<?php
namespace PHP_MVC_Objet1\models\Services;

use PHP_MVC_Objet1\models\DAOs\ActeurDao;
use PHP_MVC_Objet1\models\DAOs\GenreDao;
use PHP_MVC_Objet1\models\DAOs\MovieDao;
use PHP_MVC_Objet1\models\DAOs\DirectorDao;
use PHP_MVC_Objet1\models\entities\Acteur;

class MovieService {
    private $movieDao;
    private $genreDao;
    private $acteurdao;
    private $directorDao;

    public function __construct() {
        $this->movieDao = new MovieDao();
        $this->genreDao = new GenreDao();
        $this->acteurdao = new ActeurDao();
        $this->directorDao = new DirectorDao();
    }

    public function getById($idMovie) {
        $oneMovie = $this ->movieDao->findById($idMovie);  // ici, on retourne un objet de type (class) Movie avec toutes les données atomiques de movie (cad les données qui se trouvent que dans la table movie)
        
        $genre =$this->genreDao->findByMovie($idMovie);     // on appelle une fonction qui va retourner un objet de type genre qui contient les données de du genre du film que l'on recherche
        $oneMovie->setGenre($genre);

        $acteurs=$this->acteurdao->findByMovie($idMovie);
            $oneMovie->addActeur($acteurs);

       // $director=$this-directorDao->findByMovie($idMovie);
        
        return $oneMovie;       
    
    }

    public function create($movieData){

    }




}

?>