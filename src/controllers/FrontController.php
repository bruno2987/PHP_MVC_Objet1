<?php

namespace PHP_MVC_Objet1\Controllers;
use PHP_MVC_Objet1\models\Services\GenreService;
use PHP_MVC_Objet1\models\Services\ActeurService;
use PHP_MVC_Objet1\models\Services\MovieService;
use Twig\Environment;

class FrontController{
    private $genreService;
    private $acteurService;
    private $movie;
    private $twig;


    public function __construct($twig){
        //instanciation du genre
        $this->genreService = new GenreService();
        $this->acteurService = new ActeurService();
        $this->movie = new MovieService();
        $this->twig= $twig;
    }

    public function test(){
        echo "hello world";
    }

    public function genres(){
        $genres = $this->genreService->getAllGenres();
        //include_once __DIR__.'/../views/viewGenre.php';   // on inclut la page de view.
        echo $this->twig->render('genre.html.twig', ['genres'=>$genres]);
    }

    public function acteurs(){
        $acteurs = $this->acteurService->getAllActors();
        //print_r($acteurs);
        //include_once __DIR__.'/../views/viewActeur.php';
        echo $this->twig->render('acteur.html.twig', ['acteurs'=>$acteurs]);
    }

    public function oneMovie($idMovie){
        $oneMovie = $this->movie->getById($idMovie);
        echo $this->twig->render('movie.html.twig', ['movie'=>$oneMovie]);
        //include_once __DIR__.'/../views/viewActeurParFilm.php';
    }
}




?>