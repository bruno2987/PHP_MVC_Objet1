<?php

namespace PHP_MVC_Objet1\models\DAOs;
use PHP_MVC_Objet1\models\entities\Director;

class DirectorDao extends BaseDao {
    public function findByMovie($idMovie){
        $stmt = $this->db->prepare("SELECT director.id , director.last_name as lastName , director.first_name as firstName FROM `director` INNER JOIN movie ON movie.director_id = director.id WHERE movie.id = :idMovie ");
        $res = $stmt->execute([':idMovie'=>$idMovie]);

        if($res) {
            return $stmt->fetchObject(Director::class);
            /* La fonction ci-dessus permet de créer directement un objet de la classe visée (Director::class), ici un objet de la classe Director, à partir du résultat d'une
            requête sql.  ATTENTION: Pour que cela fonctionne, il faut que les résultat de la requête sql soient déjà dans le bon format en utilisant des alias qui correspondent
            parfaitement aux noms des attributs de la classe visée: ex: dans la requête sql: "director.last_name as lastName" --> ici, la donnée director.last_name pourra être
            appelée par son alias qu'on a mis dans la requête sql:  lastName ; c'est alias n'est pas choisi au hasard car il correspond parfaitement au nom d'attribut dans la classe
            Director    */
        } else {
            throw new \PDOException($stmt->errorInfo() [2]);
        }
    }
}



?>