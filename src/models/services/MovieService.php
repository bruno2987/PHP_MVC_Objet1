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
        $movie = $this ->movieDao->findById($idMovie);  // ici, on retourne un objet de type (class) Movie avec toutes les données atomiques de movie (cad les données qui se trouvent que dans la table movie)
        
        $genre =$this->genreDao->findByMovie($idMovie);     // on appelle une fonction qui va retourner un objet de type genre qui contient les données de du genre du film que l'on recherche
        $movie->setGenre($genre);

        $director= $this->directorDao->findByMovie($idMovie);
        $movie->setDirector($director);


        $acteurs=$this->acteurdao->findByMovie($idMovie);
            foreach($acteurs as $acteur){
                $movie->addActeur($acteur);
            }


       // $director=$this-directorDao->findByMovie($idMovie);
        
        return $movie;       
    
    }

    public function create($movieData){
        $movie = $this->movieDao->createObjectFromFields($movieData);   //création de l'objet Movie à partir des données récupéré par la méthode POST et qui sont dans $movieData

        //Il faut maintenant ajouter le genre dans l'objet $movie
        $genre = $this->genreDao->findByMovie($movieData['genre']);
        $movie->setGenre($genre);

        //On ajoute le directeur dans l'objet $movie
        $director = $this->directorDao->findByMovie($movieData['genre']);
        $movie->setDirector($director);

        //maintenant qu'on a créé un objet movie avec toutes les données dedant: On peut l'envoyer dans la base de donnée:
        $this->movieDao->sendMovieToDb($movie);

    }




}

?>