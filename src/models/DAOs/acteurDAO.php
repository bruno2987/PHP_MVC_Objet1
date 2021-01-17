<?php

namespace PHP_MVC_Objet1\models\DAOs;

use Codeception\Lib\Generator\Actor;
use PHP_MVC_Objet1\models\entities\Acteur;

class ActeurDao extends BaseDao{
    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM actor");
        $res = $stmt->execute();
        if ($res) {
            $acteurs= [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {     // fetch(\PDO::FETCH_ASSOC)    Permet de sortir  les lignes du tableau récupéré sur la base de donnée avec la requête sql plus haut : "SELECT * FROM genre"
                $acteurs[] = $this-> CreateObjectFromFields($row);
            }
            return $acteurs;
        } else {
            throw new \PDOException($stmt->errorInfo() [2]);       //  Voir système de gestion des erreurs.
        }
    }

    public function createObjectFromFields($fields): Acteur
    {         //   : Acteur   non obligatoire mais permet de spcifié que la fonction "createObjectFromFields" va retourner un objet de classe acteur
        //liaison entre la donnée BDD et l'objet
        // ci-dessous on voit le chainage ->setId->xml_set_end_namespace_decl_handler
        $acteur = new Acteur();
        $acteur->setId($fields['id']) ->setLastName($fields['last_name']) ->setfirstName($fields['first_name']);
        
        return $acteur;
    }

    public function findByMovie($idMovie) {      // Cette fonction retourne un tableau qui contient des objet de type Acteur qui sont dans le film dont l'id a été rentré en argument
        $stmt = $this->db->prepare("SELECT actor.id , actor.first_name as firstName , actor.last_name as lastName  FROM `actor` INNER JOIN movies_actors ON movies_actors.actor_id = actor.id WHERE movie_id = :idmovie ");
        $res = $stmt->execute([':idmovie' => $idMovie]);
/*
        if ($res) {
            $acteurs = [];
            $acteurRequete= $stmt->fetchAll();
            foreach ($acteurRequete as $newActeur) {
                $acteurs [] = $this->createObjectFromFields($newActeur);

            }
            return $acteurs;
        } else {
            throw new \PDOException($stmt->errorInfo() [2]);
        }        
    }
*/

if ($res) {
            return $stmt->fetchAll(\PDO::FETCH_OBJ);    // retourne un tableau d'objet de type Acteur voir doc fetch et fetchAll
            //return $stmt->fetchAll(\PDO::FETCH_CLASS, Acteur::class);   Cette ligne fait plus ou moins la même chose que la ligne au dessus mais retourne un tableau plus complexe
            // à voir pourquoi
            } else {
                throw new \PDOException($stmt->errorInfo() [2]);
            }
        }




}

?>