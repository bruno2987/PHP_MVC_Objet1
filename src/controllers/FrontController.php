<?php

namespace PHP_MVC_Objet1\Controllers;
use PHP_MVC_Objet1\models\Services\GenreService;
use PHP_MVC_Objet1\models\Services\ActeurService;
use PHP_MVC_Objet1\models\Services\MovieService;
use PHP_MVC_Objet1\models\Services\DirectorService;
use Twig\Environment;

class FrontController{
    private $genreService;
    private $acteurService;
    private $movie;
    private $directorService;
    private $twig;

    public function __construct($twig){
        //instanciation du genre
        $this->genreService = new GenreService();
        $this->acteurService = new ActeurService();
        $this->movieService = new MovieService();
        $this->directorService = new DirectorService();
        $this->twig= $twig;
    }

    public function accueil(){
        echo $this->twig->render('accueil.html.twig');
    }

    public function test(){
        echo "hello world";
    }

    public function genres(){
        $genres = $this->genreService->getAllGenres();
        //include_once __DIR__.'/../views/viewGenre.php';   // on inclut la page de view.
        echo $this->twig->render('genre.html.twig', ['genres'=>$genres]);
    }

    public function directors(){
        $directors = $this->directorService->getAllDirectors();
        //include_once __DIR__.'/../views/viewGenre.php';   // on inclut la page de view.
        echo $this->twig->render('director.html.twig', ['directors'=>$directors]);
    }

    public function acteurs(){
        $acteurs = $this->acteurService->getAllActors();
        //print_r($acteurs);
        //include_once __DIR__.'/../views/viewActeur.php';
        echo $this->twig->render('acteur.html.twig', ['acteurs'=>$acteurs]);
    }

    public function movies(){
        $movies = $this->movieService->getAllMovies();
    }

    public function oneMovie($idMovie){
        $oneMovie = $this->movieService->getById($idMovie);
        echo $this->twig->render('movie.html.twig', ['movie'=>$oneMovie]);
        //include_once __DIR__.'/../views/viewActeurParFilm.php';
    }

    public function formAddMovie(){
        $genres = $this->genreService->getAllGenres();
        $directors = $this->directorService->getAllDirectors();
        echo $this->twig->render('formAddMovie.html.twig',['genres'=>$genres,'directors'=>$directors]);
    }

}




?>