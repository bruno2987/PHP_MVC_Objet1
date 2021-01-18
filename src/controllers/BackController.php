<?php

namespace PHP_MVC_Objet1\Controllers;

use PHP_MVC_Objet1\models\Services\MovieService;

class BackController {
    private $movieService;

    public function __construct() {
        $this->movieService = new MovieService();
    }

    public function addMovie ($movieData) {
        
        $this->movieService->create($movieData);
    }
}

?>