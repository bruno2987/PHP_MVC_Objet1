<?php

require_once "vendor/autoload.php";

use PHP_MVC_Objet1\controllers\FrontController;
use PHP_MVC_Objet1\controllers\BackController;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__.'/src/views');
$twig = new Environment($loader, ['cache' => false]);


$fc = new FrontController($twig);
$bc = new BackController();
//$fc->test();

$twigAcc = 

$router = new \Klein\Klein();

$router-> respond('GET','/hello-world',function(){
    return 'HelloWorld !!!!';
});
$base  = dirname($_SERVER['PHP_SELF']);
// PHP_SELF -> nom du chemin + php de la racine (ex: /afpa/mvcobjet/index.php)
// dirname = /afpa/mvcobjet 
// REQUEST_URI = /afpa/mvcobjet/jami
//  apres trim REQUEST_URI => afpa/mvcobjet (utilisé par dispatch de klein)
if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}



$route = new \Klein\Klein();

$route->respond('GET','/',function() use($fc){
    $fc-> accueil();
});

$route->respond('GET','/toto', function() {
    return 'Hello toto !!!!';
});

$route->respond('GET','/jam', function() {
    return 'Hello jami !!!!';
});

$route->respond('GET','/test',function() use($fc) {
    $fc -> test();
});

$route->respond('GET','/genre',function() use($fc) {
    $fc -> genres();
});

$route->respond('GET','/acteur',function() use($fc) {
    $fc -> acteurs();
});

$route->respond('GET','/movie/[:id]',function($request) use($fc) {
    $fc -> oneMovie($request->id);
});

$route->respond('POST','/addMovie',function($request,$post) use($bc){
    $bc -> addMovie($request->paramsPost());    // La fonction paramsPost est une fonction de la librairie klein qui permet de récupérer tous les éléments renvoyés par la méthode POST.
});

$route->respond('GET','/formMovie',function($request) use($fc){
    $fc -> formAddMovie();
});

$route->dispatch();

//include_once __DIR__.'/src/views/viewAccueil.php';

?>