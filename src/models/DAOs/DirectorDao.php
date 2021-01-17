<?php

namespace PHP_MVC_Objet1\models\DAOs;
use PHP_MVC_Objet1\models\entities\Director;

class DirectorDao extends BaseDao {
    public function findByMovie($idMovie){
        $stmt = $this->db->prepare("SELECT director.id , director.last_name , director.first_name FROM `director` INNER JOIN movie ON movie.director_id = director.id WHERE movie.id = :idMovie ");
        $res = $stmt->execute([':idMovie'=>$idMovie]);

        if($res) {
            return $stmt->fetchObject(Director::class);
        } else {
            throw new \PDOException($stmt->errorInfo() [2]);
        }
    }
}



?>