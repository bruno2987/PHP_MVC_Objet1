<?php

namespace PHP_MVC_Objet1\Controllers;

use PHP_MVC_Objet1\models\Services\MovieService;
use Twig\Environment;

class BackController {
    private $movieService;
    private $twig;

    public function __construct() {
        $moviService = new MovieService();
    }

    public function addMovie ($movieData) {
        
        $this->movieService->create($movieData);
    }
}

?>