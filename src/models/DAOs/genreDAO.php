<?php

namespace PHP_MVC_Objet1\models\DAOs;

use PHP_MVC_Objet1\models\entities\Genre;

class GenreDao extends BaseDao {      // Cette classe hérite de BaseDao ce qui lui permet d'utiliser la connexion à la base de donnée qui est établie dans la classe BaseDao
    public function findById($id) : Genre {
        $stmt = $this->db->prepare("SELECT * FROM genre WHERE id = :id");
        $res = $stmt->execute([':id'=> $id]);

        if($res){
            return $stmt-> fetchObject(Genre::class);
        } else {
            throw new \PDOException($stmt->errorInfo() [2]);
        }

    }
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM genre");
        $res = $stmt->execute();
        if ($res) {
            $genres= [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {     // fetch(\PDO::FETCH_ASSOC)    Permet de sortir  les lignes du tableau récupéré sur la base de donnée avec la requête sql plus haut : "SELECT * FROM genre"
                $genres[] = $this-> CreateObjectFromFields($row);
            }
            return $genres;
        } else {
            throw new \PDOException($stmt->errorInfo () [2]);       //  Voir système de gestion des erreurs.
        }
    }

    public function createObjectFromFields($fields): Genre {         //   : genre   non obligatoire mais permet de spcifié que la fonction "createObjectFromFields" va retourner un objet de classe genre
        //liaison entre la donnée BDD et l'objet
        // ci-dessous on voit le chainage ->setId->xml_set_end_namespace_decl_handler
        $genre = new Genre();
        $genre->setId($fields['id']) ->setName($fields['name']);
        
        return $genre;
    }

    public function findByMovie($idMovie) : Genre {
        $stmt = $this->db->prepare("SELECT genre.id as 'id' , genre.name as 'name' FROM `genre` INNER JOIN movie ON movie.genre_id = genre.id WHERE movie.id = :id ");
        $res = $stmt->execute([':id'=> $idMovie]);
        if($res){
            return $stmt-> fetchObject(Genre::class);
        } else {
            throw new \PDOException($stmt->errorInfo() [2]);
        }

    }


}


?>